// user Ember Data as a data store
Blogger.ApplicationSerializer = DS.LSSerializer.extend();
Blogger.ApplicationAdapter = DS.LSAdapter.extend();

var posts = [
{
  id: '2',
  title: "The Count",
  body: "I have given the letters. I threw them through the bars of my window with a gold piece, and made what signs I could to have them posted. The man who took them pressed them to his heart and bowed, and then put them in his cap. I could do no more. I stole back to the study, and began to read. As the Count did not come in, I have written here."
},
{
  id: '1',
  title: "I love blood",
  body: "I awoke in my own bed. If it be that I had not dreamt, the Count must have carried me here. I tried to satisfy myself on the subject, but could not arrive at any unquestionable result. To be sure, there were certain small evidences, such as that my clothes were folded and laid by in a manner which was not my habit. My watch was still unwound, and I am rigorously accustomed to wind it the last thing before going to bed, and many such details. But these things are no proof, for they may have been evidences that my mind was not as usual, and, for some cause or another, I had certainly been much upset. I must watch for proof. Of one thing I am glad. If it was that the Count carried me here and undressed me, he must have been hurried in his task, for my pockets are intact. I am sure this diary would have been a mystery to him which he would not have brooked. He would have taken or destroyed it. As I look round this room, although it has been to me so full of fear, it is now a sort of sanctuary, for nothing can be more dreadful than those awful women, who were, who are, waiting to suck my blood."
},
{
  id: '3',
  title: "Thievery",
  body: "Every scrap of paper was gone, and with it all my notes, my memoranda, relating to railways and travel, my letter of credit, in fact all that might be useful to me were I once outside the castle. I sat and pondered awhile, and then some thought occurred to me, and I made search of my portmanteau and in the wardrobe where I had placed my clothes."
}
];

var comments = [
{
  id: '1',
  postId: '3',
  text: 'What a shame!'
},
{
  id: '2',
  postId: '3',
  text: 'I am so sorry. How are you feeling now?'
},
{
  id: '3',
  postId: '1',
  text: 'I love blood too!'
},
{
  id: '4',
  postId: '1',
  text: 'Eeew, blood is gross.'
},
{
  id: '5',
  postId: '2',
  text: 'This all sounds so mysterious.'
}
]
