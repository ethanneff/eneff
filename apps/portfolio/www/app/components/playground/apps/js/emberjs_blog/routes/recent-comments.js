// create route called RecentCommentsRoute (needs to have the name correct)
// controller and template do not have to be explicitity named if they are the same name
Blogger.RecentCommentsRoute = Ember.Route.extend({
	// pick model
	model: function() {
		// return the data store, and find the model name 'comments' and get every instance
		return this.store.find('comment');
	}
});
