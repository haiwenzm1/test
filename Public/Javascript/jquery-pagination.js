/**
 * This jQuery plugin displays pagination links inside the selected elements.
 *
 * @author Gabriel Birke (birke *at* d-scribe *dot* de)
 * @version 1.2
 * @param {int} maxentries Number of entries to paginate
 * @param {Object} opts Several options (see README for documentation)
 * @return {Object} jQuery Object
 */
jQuery.fn.pagination = function(maxentries, opts){
    opts = jQuery.extend({
        items_per_page:10,
        num_display_entries:10,
        current_page:0,
        num_edge_entries:0,
        link_to:"#",
        prev_text:"Prev",
        next_text:"Next",
        ellipse_text:"...",
        prev_show_always:true,
        next_show_always:true,
        callback:function(){return false;}
    },opts||{});

    return this.each(function() {
        /**
         * è®¡ç®—æœ€å¤§åˆ†é¡µæ˜¾ç¤ºæ•°ç›®
         */
        function numPages() {
            return Math.ceil(maxentries/opts.items_per_page);
        }
        /**
         * æžç«¯åˆ†é¡µçš„èµ·å§‹å’Œç»“æŸç‚¹ï¼Œè¿™å–å†³äºŽcurrent_page å’Œ num_display_entries.
         * @è¿”å›ž {æ•°ç»„(Array)}
         */
        function getInterval()  {
            var ne_half = Math.ceil(opts.num_display_entries/2);
            var np = numPages();
            var upper_limit = np-opts.num_display_entries;
            var start = current_page>ne_half?Math.max(Math.min(current_page-ne_half, upper_limit), 0):0;
            var end = current_page>ne_half?Math.min(current_page+ne_half, np):Math.min(opts.num_display_entries, np);
            return [start,end];
        }

        /**
         * åˆ†é¡µé“¾æŽ¥äº‹ä»¶å¤„ç†å‡½æ•°
         * @å‚æ•° {int} page_id ä¸ºæ–°é¡µç 
         */
        function pageSelected(page_id, evt){
            current_page = page_id;
            drawLinks();
            var continuePropagation = opts.callback(page_id, panel);
            if (!continuePropagation) {
                if (evt.stopPropagation) {
                    evt.stopPropagation();
                }
                else {
                    evt.cancelBubble = true;
                }
            }
            return continuePropagation;
        }

        /**
         * æ­¤å‡½æ•°å°†åˆ†é¡µé“¾æŽ¥æ’å…¥åˆ°å®¹å™¨å…ƒç´ ä¸­
         */
        function drawLinks() {
            panel.empty();
            var interval = getInterval();
            var np = numPages();
            // è¿™ä¸ªè¾…åŠ©å‡½æ•°è¿”å›žä¸€ä¸ªå¤„ç†å‡½æ•°è°ƒç”¨æœ‰ç€æ­£ç¡®page_idçš„pageSelectedã€‚
            var getClickHandler = function(page_id) {
                return function(evt){ return pageSelected(page_id,evt); }
            }
            //è¾…åŠ©å‡½æ•°ç”¨æ¥äº§ç”Ÿä¸€ä¸ªå•é“¾æŽ¥(å¦‚æžœä¸æ˜¯å½“å‰é¡µåˆ™äº§ç”Ÿspanæ ‡ç­¾)
            var appendItem = function(page_id, appendopts){
                page_id = page_id<0?0:(page_id<np?page_id:np-1); // è§„èŒƒpage idå€¼
                appendopts = jQuery.extend({text:page_id+1, classes:""}, appendopts||{});
                if(page_id == current_page){
                    var lnk = jQuery("<span class='current'>"+(appendopts.text)+"</span>");
                }else{
                    var lnk = jQuery("<a>"+(appendopts.text)+"</a>")
                        .bind("click", getClickHandler(page_id))
                        .attr('href', opts.link_to.replace(/__id__/,page_id));
                }
                if(appendopts.classes){lnk.addClass(appendopts.classes);}
                panel.append(lnk);
            }
            // äº§ç”Ÿ"Previous"-é“¾æŽ¥
            if(opts.prev_text && (current_page > 0 || opts.prev_show_always)){
                appendItem(current_page-1,{text:opts.prev_text, classes:"prev"});
            }
            // äº§ç”Ÿèµ·å§‹ç‚¹
            if (interval[0] > 0 && opts.num_edge_entries > 0)
            {
                var end = Math.min(opts.num_edge_entries, interval[0]);
                for(var i=0; i<end; i++) {
                    appendItem(i);
                }
                if(opts.num_edge_entries < interval[0] && opts.ellipse_text)
                {
                    jQuery("<span>"+opts.ellipse_text+"</span>").appendTo(panel);
                }
            }
            // äº§ç”Ÿå†…éƒ¨çš„äº›é“¾æŽ¥
            for(var i=interval[0]; i<interval[1]; i++) {
                appendItem(i);
            }
            // äº§ç”Ÿç»“æŸç‚¹
            if (interval[1] < np && opts.num_edge_entries > 0)
            {
                if(np-opts.num_edge_entries > interval[1]&& opts.ellipse_text)
                {
                    jQuery("<span>"+opts.ellipse_text+"</span>").appendTo(panel);
                }
                var begin = Math.max(np-opts.num_edge_entries, interval[1]);
                for(var i=begin; i<np; i++) {
                    appendItem(i);
                }

            }
            // äº§ç”Ÿ "Next"-é“¾æŽ¥
            if(opts.next_text && (current_page < np-1 || opts.next_show_always)){
                appendItem(current_page+1,{text:opts.next_text, classes:"next"});
            }
        }

        //ä»Žé€‰é¡¹ä¸­æå–current_page
        var current_page = opts.current_page;
        //åˆ›å»ºä¸€ä¸ªæ˜¾ç¤ºæ¡æ•°å’Œæ¯é¡µæ˜¾ç¤ºæ¡æ•°å€¼
        maxentries = (!maxentries || maxentries < 0)?1:maxentries;
        opts.items_per_page = (!opts.items_per_page || opts.items_per_page < 0)?1:opts.items_per_page;
        //å­˜å‚¨DOMå…ƒç´ ï¼Œä»¥æ–¹ä¾¿ä»Žæ‰€æœ‰çš„å†…éƒ¨ç»“æž„ä¸­èŽ·å–
        var panel = jQuery(this);
        // èŽ·å¾—é™„åŠ åŠŸèƒ½çš„å…ƒç´
        this.selectPage = function(page_id){ pageSelected(page_id);}
        this.prevPage = function(){
            if (current_page > 0) {
                pageSelected(current_page - 1);
                return true;
            }
            else {
                return false;
            }
        }
        this.nextPage = function(){
            if(current_page < numPages()-1) {
                pageSelected(current_page+1);
                return true;
            }
            else {
                return false;
            }
        }
        // æ‰€æœ‰åˆå§‹åŒ–å®Œæˆï¼Œç»˜åˆ¶é“¾æŽ¥
        drawLinks();
        // å›žè°ƒå‡½æ•°
        opts.callback(current_page, this);
    });
}

