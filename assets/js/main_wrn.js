
jQuery(document).ready(function( $ ) {

var options = {

  url: function(phrase) {
    return search_vars.ajax_url;
  },

  list: {
  		maxNumberOfElements: 10,
		match: {
			enabled: true
		}
	},
  //ad
	template: {
		type: "custom",
		method: function(value, item) {
			return     '<a href="'+item.guid+'" class="link_search_post">'+
                '<div class="media">'+
                
                '<img class="mr-3" height="64" width="64" src="'+item.image+'" alt="'+item.title+'">'+
                '<div class="media-body">'+
                  '<h6 class="mt-0">'+item.title+'</h6>'+
                  '<p>'+item.post_content+'</p>'+
                '</div>'+
                
              '</div>'+
              '</a>'+
              '<hr>';
		}
	},

  getValue: function(element) {
    return element.title;
  },

  ajaxSettings: {
    dataType: "json",
    method: "POST",
    data: {
      dataType: "json",
      action:'search_posts_wr',
    }
  },

  preparePostData: function(data) {
    data.phrase = $("#ajax_posts_text").val();
    return data;
  },

  requestDelay: 400,
};

$("#ajax_posts_text").easyAutocomplete(options);

});