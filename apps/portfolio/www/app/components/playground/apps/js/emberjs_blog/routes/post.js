// create route called PostRoute (needs to have the name correct)
// controller and template do not have to be explicitity named if they are the same name
Blogger.PostRoute = Ember.Route.extend({
	// pick model
	model: function(params) {
		// return the data store, and find the model name 'post' and get one instance
		return this.store.find('post', params.post_id);
	}
});
