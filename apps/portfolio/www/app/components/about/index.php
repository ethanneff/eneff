<?php
include_once(dirname(dirname(dirname(__FILE__))) . "/shared/inc/config.php");

$datetime1 = new DateTime();
$datetime2 = new DateTime('1990-11-19');
$interval = $datetime1->diff($datetime2);
?>

<section class="group" id="about">
  <ul>
    <li class="group">
      <div class="text-box">
        <h3>Hi. I'm Ethan Neff!</h3>
        <p>I am a <?php echo $interval->format('%y'); ?> year old graduate from the University of Texas at Austin with a BBA in Management Information Systems and a minor in Computer Science.</p>
        <p>This website is my development playground - where I will document, showcase, provide status updates, and play around with all things new happening on the web.</p>
        <p>As of right now, the site is not much as it is only a couple weeks old, but I have big plans for it so it will evolve and become better with time.</p>
      </div>
      <a>
        <figure class="tint">
          <img src="<?php echo BASE_URL; ?>assets/img/about/ethan_neff_portrait_mini.jpg" alt="self portrait of ethan neff" id="profile-picture">
        </figure>
      </a>
    </li>
    <li class="group">
      <div class="text-box">
        <h3>Resume</h3>
        <p>If you wish to contact with me or keep in touch, feel free to use the social navigation links on the top of the page.</p>
      </div>
      <a href="#" data-modal="resume">
        <figure class="tint">
          <img src="<?php echo BASE_URL; ?>assets/img/about/ethan_neff_resume.png" alt="resume of ethan neff">
        </figure>
      </a>
    </li>
    <li class="group">
      <div class="text-box">
        <h3>Current Project</h3>
        <p>I am in the process of finalizing an iPhone app. This app focuses on the ability to record, organize, and prioritize all thoughts and actionable tasks into Evernote. My productivity success with <a href="//www.thesecretweapon.org/">The Secret Weapon</a> methodology was my inspiration for this app, and I cannot wait for it to be released in the App Store to be used by others.</p>
      </div>
      <a href="//youtu.be/9biGjosW1NU" title="link to youtube app demo">
        <figure class="tint">
          <img src="<?php echo BASE_URL; ?>assets/img/about/secret_weapon_mini.gif" alt="snapshot of the iPhone app I am creating called The Secret Weapon">
        </figure>
      </a>
    </li>
  </ul>

  <div class="modal" data-modal="resume">
    <div class="modal-content">
      <span class="close">×</span>
      <h3>Resume</h3>
      <img src="<?php echo BASE_URL; ?>assets/img/about/ethan_neff_resume.png" alt="resume of ethan neff">
    </div>
  </div>
</section>
