// to handle the save action in the new-comment.hbs template
Blogger.NewCommentController = Ember.Controller.extend({
	// other controllers this controller needs access too
	needs: ['post'],

	actions: {
		save: function() {
			var comment = this.store.createRecord('comment', {
				text: this.get('text')
			});
			comment.save();

			// pull from the post controller
			var post = this.get('controllers.post.model');
			// push the comment to that specific post
			post.get('comments').pushObject(comment);
			// save that post object in the model
			post.save();

			// transition out
			this.transitionToRoute('post', post.id);
		}
	}
})