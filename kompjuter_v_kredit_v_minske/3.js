function sdf_FTS(_number,_decimal,_separator)
{
    // определяем, количество знаков после точки, по умолчанию выставляется 2 знака
        var decimal=(typeof(_decimal)!='undefined')?_decimal:2;

    // определяем, какой будет сепаратор [он же разделитель] между разрядами
        var separator=(typeof(_separator)!='undefined')?_separator:'';

    // преобразовываем входящий параметр к дробному числу, на всяк случай, если вдруг
    // входящий параметр будет не корректным
        var r=parseFloat(_number)

    // так как в javascript нет функции для фиксации дробной части после точки
    // то выполняем своеобразный fix
        var exp10=Math.pow(10,decimal);// приводим к правильному множителю
        r=Math.round(r*exp10)/exp10;// округляем до необходимого числа знаков после запятой

    // преобразуем к строгому, фиксированному формату, так как в случае вывода целого числа
    // нули отбрасываются не корректно, то есть целое число должно
    // отображаться 1.00, а не 1
        rr=Number(r).toFixed(decimal).toString().split('.');

    // разделяем разряды в больших числах, если это необходимо
    // то есть, 1000 превращаем 1 000
        b=rr[0].replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1"+separator);

    // можно использовать r=b+'.'+rr[1], но при 0 после запятой выходит ошибка undefined,
    // поэтому применяем костыль
        r=(rr[1]?b+'.'+rr[1]:b);

        return r;// возвращаем результат
}

var SCalc = new Class({
    initialize: function(frm, formula, nsigns) {
        this.form = $(frm);
        this.formula = formula;
        this.nsigns = nsigns || 0;
        var _this = this;
        this.form.getFormElements().each(function(el){
            if(this.isFormulaPart(el)) {
                el.addEvent('change', _this.calcData.bind(_this));
                if(el.getTag() == 'input' && (el.getAttribute('type') == 'radio' || el.getAttribute('type') == 'checkbox'))
                    el.addEvent('click', _this.calcData.bind(_this));

                if(el.getAttribute('type') == 'text' || el.getTag() == 'select')
                    el.addEvent('keyup', _this.calcData.bind(_this));
            }
        }.bind(this));
        this.calcData();
    }
    ,isFormulaPart: function(el) {
        var isPart = false;
        var regexp = new RegExp('\{'+el.name+'\}');
        this.formula.each(function(formula){
            if(el.name && formula.match(regexp) !== null) {
                isPart = true;
                return false;
            }
        });
        return isPart;
    }
    ,calcData: function() {
        var vals = [];
        this.form.getFormElements().each(function(el) {
            if(el.name) {
                var v = el.getValue();
                if(v!==false)vals[el.name] = v;
            }
        });
        this.formula.each(function(formula){
            var wformula = formula;
            for(var fld in vals)
                if(typeof vals[fld] !== 'function')
                    wformula = wformula.replace(new RegExp('{'+fld+'}','gm'), vals[fld]?vals[fld].replace(',', '.'):0);
            wformula = wformula.replace(/\{.*?\}/g, '0');
            var result;
            try { result = eval(wformula); }
            catch(e) { result = NaN; }
            var rfield = formula.split('=')[0];
            if(rfield.trim())
              this.setResult(rfield, result);
        }.bind(this));
    }
    ,setResult: function(rfield, result) {
        if(isFinite(result))
        {
            var divider = Math.pow(10, this.nsigns);
            result = Math.round(result);
			
            $(rfield).value=result;

            $(rfield+'_disp').setText(sdf_FTS(result,0,' '));
			
			}
        else
        {
            $(rfield+'_disp').setText('');
            $(rfield).value=result;
        }
    }	
});


window.addEvent('domready', function(){
    if(!$chk(__FC_FORMULA))return;
    var formCheck = new FormCheck('calcForm', {
        display: {
            keepFocusOnError: 0,
            showErrors: 1,
            checkValueIfEmpty: 0
        }
        ,regexp: {
            number : /^[-+]?\d*(\.|,)?\d+$/
        }
        ,submit: __FC_SUBMIT
    });
    new SCalc('calcForm', __FC_FORMULA);
    if(!__FC_SUBMIT){
        formCheck.addEvent('validateSuccess', function(){
            new Ajax('index.php', {
                data: {
                    option: 'com_formcalc'
                    ,task: 'checkCaptcha'
                    ,format: 'raw'
                    ,captcha: formCheck.form.captcha.value
                }
                ,onComplete: function(resp) {
                    var r = Json.evaluate(resp);
                    if(r.success)$('calcForm').submit();
                    else alert(__FC_CAPTCHA_TEXT);
                }
            }).request();
            //$('calcForm').submit();
        });
    }
});
