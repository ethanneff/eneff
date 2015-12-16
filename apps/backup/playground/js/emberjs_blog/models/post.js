// create an Ember Data model called Post
Blogger.Post = DS.Model.extend({
	title: DS.attr(),
	body: DS.attr(),
	// post has many comments
	comments: DS.hasMany('comment', {async: true})
});