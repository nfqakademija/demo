(function($){

    function bind(fn,obj) {
        return function() {
            fn.apply(obj,arguments);
        };
    }

    function LikeButton() {};

    /**
     * @private
     */
    LikeButton.prototype._create = function()
    {
        this._on(this.element,{
            "click": "onClick"
        });
        console.log('created!!!');
    };

    /**
     * Event listener
     * @param event
     */
    LikeButton.prototype.onClick = function(event) {
        console.log('veikia');
        event.preventDefault();
        this.sendLike();
    };

    /**
     * Sends like request
     */
    LikeButton.prototype.sendLike = function()
    {
        $.get(this.element.attr('href'), {}, bind(this._handleResponse, this),'json');
    };

    /**
     * Handles response
     */
    LikeButton.prototype._handleResponse = function(data)
    {
        if (data.status == 'EXISTS') {
            alert('Like already exists');
        }
        this.element.css('color', 'green').unbind('click').attr('href', 'javascript:;');
    };



    $.widget('nfq.likeButton', LikeButton.prototype);


    $.widget('nfq.likeButtonCustom', $.nfq.likeButton, {
        onClick: function() {
            alert('Going to send like');
            this._super();
        }
    });
})(jQuery);