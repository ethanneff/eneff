// create route called PostsRoute (needs to have the name correct)
// controller and template do not have to be explicitity named if they are the same name
Blogger.PostsRoute = Ember.Route.extend({
	// pick the controller
	controllerName: 'posts',
	// pick the template (view)
	renderTemplate: function() {
		this.render('posts');
	},
	// pick model
	model: function() {
		// return the data store, and find the model name 'post' and get every instance
		return this.store.find('post');
	}
});
