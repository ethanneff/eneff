// array controller - allows sortProperties
Blogger.PostsController = Ember.ArrayController.extend({
	sortProperties: ['title'],
	actions: {
		sortByTitle: function() {
			this.set('sortProperties', ['title']);
		}
	}
});