if(window.location.href.indexOf("blog-categories/") > -1) {
   var url = window.location.href;
	var new_url = url.replace("blog-categories/", "blog/?_sft_blog_categories=");
	window.location.href = new_url;
}