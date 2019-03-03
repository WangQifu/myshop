$(function() {
    /**
     * 下面是进行插件初始化
     * 你只需传入相应的键值对
     * */
    $('#ff').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {/*输入框不同状态，显示图片的样式*/
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {/*验证*/
            	game_name: {/*键名username和input name值对应*/
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {/*非空提示*/
                            message: '游戏名不能为空'
                        },
                        stringLength: {/*长度提示*/
                            min: 1,
                            max: 60,
                            message: '游戏名长度必须在1到60之间'
                        }/*最后一个没有逗号*/
                    }
                },
                operator: {
                    message:'请输入内容',
                    validators: {
                        notEmpty: {
                            message: '请输入内容'
                        }
                    }
                },
                client: {
                	validators: {
                        notEmpty: {
                            message: '账号管理方：例如：网易账号、腾讯QQ、等'
                        }
                    }
                },
                region: {
                    validators: {
                        notEmpty: {
                            message: '请填写内容'
                        }
                    }
                },
                price: {
                    message:'价格',
                    validators: {
                        notEmpty: {
                            message: '请输入价格'
                        }
                    }
                },
                phone: {
                    message:'手机号码有误',
                    validators: {
                        notEmpty: {
                            message: '输入电话号码'
                        },
                        stringLength: {
                            min: 11,
                            max: 14,
                            message: '请输入11位手机号码'
                        },
                        regexp: {/* 只需加此键值对，包含正则表达式，和提示 */
                            regexp: /^1[3|5|6|7|8]{1}[0-9]{9}$/,
                            message: '手机号码有误.'
                        }
                    }
                },
                qqnum: {
                    message:'QQ有误',
                    validators: {
                        notEmpty: {
                            message: '输入QQ号码'
                        },
                        stringLength: {
                            min: 5,
                            max: 18,
                            message: '联系QQ'
                        },
                        regexp: {/* 只需加此键值对，包含正则表达式，和提示 */
                            regexp: /^[0-9]+$/,
                            message: '只能是数字'
                        }
                    }
                },
                buy_desc: {
                    message:'描述',
                    validators: {
                        notEmpty: {
                            message: '详细描述一下吧！'
                        }
                    }
                },
                shop_title: {
                    message:'标题',
                    validators: {
                        notEmpty: {
                            message: '请输入商品标题'
                        }
                    }
                },
                account_msg: {
                    message:'详细信息',
                    validators: {
                        notEmpty: {
                            message: '详细描述一下！'
                        }
                    }
                },
                longname: {
                    message:'必填',
                    validators: {
                        notEmpty: {
                            message: '必填*'
                        }
                    }
                },
                longpass: {
                    message:'必填',
                    validators: {
                        notEmpty: {
                            message: '必填*'
                        }
                    }
                },
                binding_phone: {
                    message:'必填:无绑定请说明',
                    validators: {
                        notEmpty: {
                            message: '必填:无绑定请说明'
                        }
                    }
                },
                bindingphone: {
                    message:'必填:无绑定请说明',
                    validators: {
                        notEmpty: {
                            message: '必填:无绑定请说明'
                        }
                    }
                },
                binding: {
                    message:'必填:无绑定请说明',
                    validators: {
                        notEmpty: {
                            message: '必填:无绑定请说明'
                        }
                    }
                },
                deal_pass: {
                    message:'必填',
                    validators: {
                        notEmpty: {
                            message: '必填*'
                        }
                    }
                },
                phone: {
                    message:'必填',
                    validators: {
                        notEmpty: {
                            message: '必填*'
                        }
                    }
                },
                QQ: {
                    message:'必填',
                    validators: {
                        notEmpty: {
                            message: '必填*'
                        }
                    }
                },
                kouling: {
                    message:'必填：暗号作为认证信息',
                    validators: {
                        notEmpty: {
                            message: '必填：暗号作为认证信息'
                        }
                    }
                },
                names: {
                    message:'必填：*',
                    validators: {
                        notEmpty: {
                            message: '请输入真实姓名'
                        }
                    }
                },
                user_identity_num: {
                    message:'必填：*',
                    validators: {
                        notEmpty: {
                            message: '请输入身份证号'
                        },
                        stringLength: {
                            min: 15,
                            max: 18,
                            message: '请输入18位身份号'
                        },
                        regexp: {/* 只需加此键值对，包含正则表达式，和提示 */
                            regexp: /^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/,
                            message: '身份证号码有误'
                        }
                    }
                }
            }
        });
});