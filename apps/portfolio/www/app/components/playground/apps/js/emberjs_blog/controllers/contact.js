// create controller called ContactController
Blogger.ContactController = Ember.Controller.extend({
	actions: {
		// properties
		messageSent: false,

		// send message is the name of the method declared in contact page
		// {{action: 'sendMessage'}}
		sendMessage: function() {
			var message = prompt('Type your message here:')
			this.set('confirmationNumber', Math.round(Math.random() * 100000));
			this.set('messageSent', true);
		}
	}
});