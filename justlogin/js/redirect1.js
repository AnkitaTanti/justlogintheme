if(window.location.href.indexOf("blog-categories/") > -1) {
   var url = window.location.href;
	var new_url = url.replace("blog-categories/", "blog/?_sft_blog_categories=").replace(/\/$/, '');
//	var new_url = url.replace("blog-categories/", "blog/?_sft_blog_categories=").slice(0,-1);
	console.log(new_url);
	window.location.href = new_url;
}

if(window.location.href.indexOf("knowledge_hub_categories/") > -1) {
   var url = window.location.href;
	var new_url = url.replace("knowledge_hub_categories/", "knowledge-hub/?_sft_knowledge_hub_categories=").replace(/\/$/, '');
	console.log(new_url);
	window.location.href = new_url;
}
