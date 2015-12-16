Blogger.NewPostController = Ember.Controller.extend({
	actions: {
		save: function() {
			// create in data store with the model name 'post', with the properties
			// get the properties from the new-post.hbs handlebar expression
			var newPost = this.store.createRecord('post', {
				title: this.get('title'),
				body: this.get('body')
			});

			// save into browser's local storage (persist it)
			newPost.save();

			// navigate
			this.transitionToRoute('posts');
		}
	}
});