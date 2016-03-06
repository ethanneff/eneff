// create the ember object
Blogger = Ember.Application.create();

// set up the router (routes to the correct url destination)
Blogger.Router.map(function(){
	// redirects to the posts.hbs page, then override the path in the URL to make it the homepage
  this.resource('posts', {path: '/'});
  this.resource('about', {path: 'about-us'});
  // nested route /contact/phone or /contact/email/
  this.resource('contact', function() {
  	this.resource('phone');
  	this.resource('email');
  });
  this.resource('recent-comments');
  // for handling the dynamic segment at the end of the url (blah/post/3)
  // post id is passed from the view post.hbs link-to property to the routes/post.js
  this.resource('post', {path: 'posts/:post_id'}, function() {
    this.resource('new-comment');
  });
  this.resource('new-post');
});