/*  Vertify(obj, status)
    obj: 检测的对象
    status: 1-提交时检测 0-输入时检测
*/

/*  string_必填_长度 
    必填: 1-是 0-否
    长度: 任意正整数
*/

/*  float_必填_小数_下限_上限
    必填: 1-是 0-否
    位数: 任意正整数
    下限: 若有则为任意整数,若无则为'n'
    上限: 若有则为任意整数,若无则为'n'
*/

/*  int_必填_位数_下限_上限
    必填: 1-是 0-否
    位数: 任意正整数
    下限: 若有则为任意整数,若无则为'n'
    上限: 若有则为任意整数,若无则为'n'
*/

function Vertify(name, status) {
	var obj = $('#'+name);
    if (status == 1) {
        $('.alert').remove();
    }
    let flag = true;
    obj.find('[vertify]').each(function () {
        let rel = $(this).attr('vertify').split('_');
        switch (rel[0]) {
            case 'string': {
                let endrule = '^[\\s\\S]{' + rel[2] + '}$';
                endrule = new RegExp(endrule);
                let inputrule = '^[\\s\\S]{' + rel[1] + ',' + rel[2] + '}$';
                inputrule = new RegExp(inputrule);
                if (status) {
                    if (!inputrule.test($(this).val())) {
                        if (!$(this).val().length) {
                            verror($(this), 5);
                        } else {
                            verror($(this), 1);
                        }
                        flag = false;
                    }
                } else {
                    $(this).keypress(function (e) {
                        e = window.event || e;
                        let key = window.event ? e.keyCode : e.which;
                        let backspace = window.event ? 0 : 8;
                        if (key != backspace) {
                            if (endrule.test($(this).val())) {
                                e.preventDefault();
                            }
                        }
                    }).keyup(function () {
                        if (!inputrule.test($(this).val())) {
                            if (!$(this).val().length) {
                                verror($(this), 5);
                            } else {
                                verror($(this), 1);
                            }
                        } else {
                            vsuccess($(this));
                        }
                    }).blur(function () {
                        if (!inputrule.test($(this).val())) {
                            if (!$(this).val().length) {
                                verror($(this), 5);
                            } else {
                                verror($(this), 1);
                            }
                        } else {
                            vleave($(this));
                        }
                    }).focus(function () {
                        if (!inputrule.test($(this).val())) {
                            if (!$(this).val().length) {
                                verror($(this), 5);
                            } else {
                                verror($(this), 1);
                            }
                        } else {
                            vsuccess($(this));
                        }
                    });
                }
            } break;

            case 'float': {
                let endrule = '\\.\\d{' + rel[2] + '}$';
                endrule = new RegExp(endrule);
                let inputrule = (parseInt(rel[1]) ? '' : '^\\s{0}$|') + '^[1-9]+\\d*(\\.\\d{1,2}){0,1}$|^0(\\.\\d{1,2}){0,1}$';
                inputrule = new RegExp(inputrule);

                if (status) {
                    if (!inputrule.test($(this).val())) {
                        if (!$(this).val().length) {
                            verror($(this), 5);
                        } else {
                            verror($(this), 1);
                        }
                        flag = false;
                    } else {
                        if (rel[3] && (rel[3] != 'n')) {
                            if ($(this).val() < parseFloat(rel[3])) {
                                verror($(this), 2);
                                flag = false;
                            }
                        }
                        if (rel[4] && (rel[4] != 'n')) {
                            if ($(this).val() > parseFloat(rel[4])) {
                                verror($(this), 3);
                                flag = false;
                            }
                        }
                    }
                } else {
                    $(this).keypress(function (e) {
                        e = window.event || e;
                        let key = window.event ? e.keyCode : e.which;
                        let backspace = window.event ? 0 : 8;
                        if (key != backspace) {
                            if ((key >= 48 && key <= 57) || key == 46) {
                                if (endrule.test($(this).val())) {
                                    e.preventDefault();
                                }
                            } else {
                                e.preventDefault();
                            }
                        }
                    }).keyup(function () {
                        if (!inputrule.test($(this).val())) {
                            if (!$(this).val().length) {
                                verror($(this), 5);
                            } else {
                                verror($(this), 1);
                            }
                        } else {
                            let mflag = true;
                            if (rel[3] && (rel[3] != 'n')) {
                                if ($(this).val() < parseFloat(rel[3])) {
                                    verror($(this), 2);
                                    mflag = false;
                                }
                            }
                            if (rel[4] && (rel[4] != 'n')) {
                                if ($(this).val() > parseFloat(rel[4])) {
                                    verror($(this), 3);
                                    mflag = false;
                                }
                            }
                            if (mflag) {
                                vsuccess($(this));
                            }
                        }
                    }).blur(function () {
                        if (!inputrule.test($(this).val())) {
                            if (!$(this).val().length) {
                                verror($(this), 5);
                            } else {
                                verror($(this), 1);
                            }
                        } else {
                            let mflag = true;
                            if (rel[3] && (rel[3] != 'n')) {
                                if ($(this).val() < parseFloat(rel[3])) {
                                    verror($(this), 2);
                                    mflag = false;
                                }
                            }
                            if (rel[4] && (rel[4] != 'n')) {
                                if ($(this).val() > parseFloat(rel[4])) {
                                    verror($(this), 3);
                                    mflag = false;
                                }
                            }
                            if (mflag) {
                                vleave($(this));
                            }
                        }
                    }).focus(function () {
                        if (!inputrule.test($(this).val())) {
                            if (!$(this).val().length) {
                                verror($(this), 5);
                            } else {
                                verror($(this), 1);
                            }
                        } else {
                            let mflag = true;
                            if (rel[3] && (rel[3] != 'n')) {
                                if ($(this).val() < parseFloat(rel[3])) {
                                    verror($(this), 2);
                                    mflag = false;
                                }
                            }
                            if (rel[4] && (rel[4] != 'n')) {
                                if ($(this).val() > parseFloat(rel[4])) {
                                    verror($(this), 3);
                                    mflag = false;
                                }
                            }
                            if (mflag) {
                                vsuccess($(this));
                            }
                        }
                    });
                }
            } break;

            case "int": {
                let endrule = '\\d{' + rel[2] + '}$';
                endrule = new RegExp(endrule);
                let inputrule = (parseInt(rel[1]) ? '' : '^\\s{0}$|') + '^0$|^[1-9]{1}\\d*$';
                inputrule = new RegExp(inputrule);

                if (status) {
                    if (!inputrule.test($(this).val())) {
                        if (!$(this).val().length) {
                            verror($(this), 5);
                        } else {
                            verror($(this), 1);
                        }
                        flag = false;
                    } else {
                        if (rel[3] && (rel[3] != 'n')) {
                            if ($(this).val() < parseInt(rel[3])) {
                                verror($(this), 2);
                                flag = false;
                            }
                        }
                        if (rel[4] && (rel[4] != 'n')) {
                            if ($(this).val() > parseInt(rel[4])) {
                                verror($(this), 3);
                                flag = false;
                            }
                        }
                    }
                } else {
                    $(this).keypress(function (e) {
                        e = window.event || e;
                        let key = window.event ? e.keyCode : e.which;
                        let backspace = window.event ? 0 : 8;
                        if (key != backspace) {
                            if (!(key >= 48 && key <= 57)) {
                                e.preventDefault();
                            } else {
                                if (endrule.test($(this).val())) {
                                    e.preventDefault();
                                }
                            }
                        }
                    }).keyup(function () {
                        if (!inputrule.test($(this).val())) {
                            if (!$(this).val().length) {
                                verror($(this), 5);
                            } else {
                                verror($(this), 1);
                            }
                        } else {
                            let mflag = true;
                            if (rel[3] && (rel[3] != 'n')) {
                                if ($(this).val() < parseInt(rel[3])) {
                                    verror($(this), 2);
                                    mflag = false;
                                }
                            }
                            if (rel[4] && (rel[4] != 'n')) {
                                if ($(this).val() > parseInt(rel[4])) {
                                    verror($(this), 3);
                                    mflag = false;
                                }
                            }
                            if (mflag) {
                                vsuccess($(this));
                            }
                        }
                    }).blur(function () {
                        if (!inputrule.test($(this).val())) {
                            if (!$(this).val().length) {
                                verror($(this), 5);
                            } else {
                                verror($(this), 1);
                            }
                        } else {
                            let mflag = true;
                            if (rel[3] && (rel[3] != 'n')) {
                                if ($(this).val() < parseInt(rel[3])) {
                                    verror($(this), 2);
                                    mflag = false;
                                }
                            }
                            if (rel[4] && (rel[4] != 'n')) {
                                if ($(this).val() > parseInt(rel[4])) {
                                    verror($(this), 3);
                                    mflag = false;
                                }
                            }
                            if (mflag) {
                                vleave($(this));
                            }
                        }
                    }).focus(function () {
                        if (!inputrule.test($(this).val())) {
                            if (!$(this).val().length) {
                                verror($(this), 5);
                            } else {
                                verror($(this), 1);
                            }
                        } else {
                            let mflag = true;
                            if (rel[3] && (rel[3] != 'n')) {
                                if ($(this).val() < parseInt(rel[3])) {
                                    verror($(this), 2);
                                    mflag = false;
                                }
                            }
                            if (rel[4] && (rel[4] != 'n')) {
                                if ($(this).val() > parseInt(rel[4])) {
                                    verror($(this), 3);
                                    mflag = false;
                                }
                            }
                            if (mflag) {
                                vsuccess($(this));
                            }
                        }
                    });
                }
            } break;

			/*  select_标识_name
				标识:
					1: 唯一
					2: 联动[_标识_name]
					3: 必填
					4: 非必填
			*/
            case "select": {
                let _this = this;
                if (status) {
                    if (rel[1] == 1) { // 唯一
                        let tag = [];
                        let mflag = true;
                        $("select[name=" + rel[2] + "]").each(function () {
                            if (tag.indexOf($(this).val()) == -1) {
                                tag.push($(this).val());
                            } else {
                                flag = false;
                                mflag = false;
                            }
                        });
                        if (!mflag) {
                            verror($(_this), 4);
                        }
                    }

                    if (rel[1] == 2) {
                        if (rel[3] == 3) {
                            if ($("select[name=" + rel[4] + "]").length) {
                                if (!$("select[name=" + rel[4] + "]").val()) {
                                    verror($(_this), 5);
                                } else {
                                    vsuccess($(_this));
                                }
                            }
                        }
                    }

                    if (rel[1] == 3) { //必填
                        if ($("select[name=" + rel[2] + "]").length) {
                            if (!$("select[name=" + rel[2] + "]").val()) {
                                flag = false;
                                verror($(_this), 5);
                            }
                        }
                    }
                } else {
                    if (rel[1] == 1) {
                        $(document).on("change", "select[name=" + rel[2] + "]", function () {
                            let tag = [];
                            let mflag = true;
                            $("select[name=" + rel[2] + "]").each(function () {
                                if (tag.indexOf($(this).val()) == -1) {
                                    tag.push($(this).val());
                                } else {
                                    mflag = false;
                                }
                            });
                            if (!mflag) {
                                verror($(_this), 4);
                            } else {
                                vsuccess($(_this));
                            }
                        });
                    }

                    if (rel[1] == 3) {
                        $(document).on("change", "select[name=" + rel[2] + "]", function () {
                            if ($("select[name=" + rel[2] + "]").length) {
                                if (!$("select[name=" + rel[2] + "]").val()) {
                                    verror($(_this), 5);
                                } else {
                                    vsuccess($(_this));
                                }
                            }
                        });
                    }

                    if (rel[1] == 2) {
                        $(document).on("change", "select[name=" + rel[2] + "]", function () {
                            setTimeout(function () {
                                if (rel[3] == 3) {
                                    if ($("select[name=" + rel[4] + "]").length) {
                                        if (!$("select[name=" + rel[4] + "]").val()) {
                                            verror($(_this), 5);
                                        } else {
                                            vsuccess($(_this));
                                        }
                                    }
                                }
                            }, 200);
                        });
                    }
                }
            } break;

            /*  checkbox_标识_name
				标识:
					1: 唯一
			*/
            case "checkbox": {
                let _this = this;
                if (status) {
                    if (rel[1] == 1) { // 唯一  
                        if (!$("[name=" + rel[2] + "]:checked").length) {
                            verror($(_this), 5);
                            flag = false;
                        }
                    }
                } else {
                    if (rel[1] == 1) {
                        $(document).on("click", "[name=" + rel[2] + "]", function () {
                            if (!$("[name=" + rel[2] + "]:checked").length) {
                                verror($(_this), 5);
                            } else {
                                vsuccess($(_this));
                            }
                        });
                    }
                }
            } break;
        }
    });
    return flag;
}

function addInfo(obj, info) {
    obj.parent().find('.alert').remove();
    let top = 0;
    let left = obj[0].offsetLeft + obj[0].offsetWidth;
    let width = obj[0].offsetWidth;
    let html = '<div class="alert alert-danger" style=" width: ' + width + 'px; top: ' + top + 'px; left: ' + left + 'px; display: block;">' + info + '</div>';
    obj.after(html);
}

function vsuccess(obj) {
    obj.parent().find('.alert').remove();
    obj.css("border-color", "#7FFF00");
}

function verror(obj, errcode) {
    obj.css("border-color", "#F00");
    switch (errcode) {
        case 1: addInfo(obj, '格式不对'); break;
        case 2: addInfo(obj, '低于下限'); break;
        case 3: addInfo(obj, '高于上限'); break;
        case 4: addInfo(obj, '不能重复'); break;
        case 5: addInfo(obj, '不能为空'); break;
    }
}

function vleave(obj) {
    obj.parent().find('.alert').remove();
    obj.css("border-color", "#ccc");
}