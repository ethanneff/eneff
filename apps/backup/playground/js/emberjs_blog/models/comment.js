// create an Ember Data model called Post
Blogger.Comment = DS.Model.extend({
	text: DS.attr(),
	// comments belong to a post
	post: DS.belongsTo('post', {async: true})
});