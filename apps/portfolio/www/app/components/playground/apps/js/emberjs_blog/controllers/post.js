// object controller instead of controller
// object controller passes data to the model as you type
Blogger.PostController = Ember.ObjectController.extend({
	isEditing: false,
	actions: {
		edit: function() {
			this.set('isEditing', true);
		},
		save: function() {
			this.set('isEditing', false);
		},
		delete: function() {
			if(confirm('Are you sure?')) {
				// remove the record from the template and data storage
				this.get('model').destroyRecord();
				this.transitionToRoute('posts');
			}
		}
	}
});