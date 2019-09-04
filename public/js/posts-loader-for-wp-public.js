(function( $ ) {
	'use strict';

	const navigation = {
		init: function(){
			this.cacheDom();

			if( this.$defaultNavElem.length > 0 ){
				this.hideDefaultNav();
			}

			this.eventHandler();
		},
		cacheDom: function(){
			this.$body = $('body');
			this.$defaultNavElem = this.$body.find('nav.pagination');
			this.$appendElem = this.$body.find('main#main');

			this.maxPage = localizedArgs.max_page;
			this.currentPage = localizedArgs.current_page;
			this.queryArgs = localizedArgs.query_args;
		},
		eventHandler: function(){
			this.$body.find('button.load-more-posts').on( 'click', this.loadMorePosts.bind(this) );
		},
		hideDefaultNav: function(){
			this.$defaultNavElem.hide();
			this.addLoadMoreBtn()
		},
		addLoadMoreBtn: function(){
			this.$defaultNavElem.after("<button class='btn load-more-posts' data-page='1'>Load More</button>");
		},
		loadMorePosts: function(e){
			e.preventDefault();

			var that = this;
			$.ajax({
				url: localizedArgs.ajax_url,
				type: "post",
				// dataType: 'json',
				data: {
					'action': 'load_more_posts',
					'query_args': that.queryArgs,
					'max_page': that.maxPage,
					'current_page': that.currentPage,
				},
				beforeSend: function(){

				},
				error: function( error ){
					console.log('ERROR');
					console.log(error);
				},
				success: function( response ){
					console.log(response);
					that.$appendElem.after(response);
				}
			});
		}
	}

	navigation.init();

})( jQuery );
