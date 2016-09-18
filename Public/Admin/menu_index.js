$(function() {
    var fuc = {
        config: {
            htmlStr: ''
        },
        init: function() {
            this.bindEvent();
            this.renderTable("init");
        },
        handleData: function(data) {
            if (data) {
                var that = this;
                htmlStr += '<ul>';

                for (var i = 0; i < data.length; i++) {
                    htmlStr += '<li>' + data[i]['name'] + '</li>';
                    if (data[i]['list']) {
                        that.handleData(data[i]['name']);
                    }
                }

                htmlStr += '</ul>';
                return htmlStr;
            }
            /* if(data){
                     var htmlStr = '';
                     for(var i = 0; i < data.length; i++ ){
                         htmlStr += '<div class="row"><div class="col-lg-12"><section class="panel">';
                         htmlStr += '<header class="panel-heading"> '+ data[i]['name'] +' <span class="tools pull-right"><a class="fa fa-chevron-down" href="javascript:;"></a> </span></header>';
                         if(data[i]['list']){
                             htmlStr += '<div class="panel-body"><div class="row"><div class="col-md-12"><div class="adv-table"><table class="display table table-bordered table-striped"><tbody>';
                             for(var j = 0; j < data[i]['list'].length; j++ ){
                                 htmlStr += '<tr><td><div class="icheck"><div class="flat-green single-row"><div class="radio">';
                                 htmlStr += '<input type="checkbox" name="radio'+ i +'"><label>'+data[i]['list'][j]['name']+'</label>';
                                 htmlStr += '</div></div></div></td>';

                                 htmlStr += '<td><p class="text-warning">描述</p></td>';
                                 htmlStr += '<td>状态</td>';

                                 htmlStr += '<td><button class="btn btn-link" type="button">禁用</button><button class="btn btn-link" type="button">删除</button></td>';
                                  
                                 htmlStr += '</tr>';

                             }
                             htmlStr += '</div></div></div></tbody></table></div>';
                         }
                         htmlStr += '</section></div></div>';
                     }
                return htmlStr;
            }*/
        },
        bindEvent: function() {
            var that = this;
        },
        renderTable: function() {
            var that = this;
            $.ajax({
                type: "post",
                url: "{:U('getAllInfo')}",
                success: function(data) {
                    if (data.info.length) {
                        $('#content').empty().append(that.handleData(data.info));
                        $('.flat-green input').iCheck({ checkboxClass: 'icheckbox_flat-green', radioClass: 'iradio_flat-green' });
                    }
                }
            })
        }
    }

    fuc.init();
});