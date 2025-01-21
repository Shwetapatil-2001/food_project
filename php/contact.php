<?php include_once('header.php'); ?>    
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<form  method="POST" enctype="multipart/form-data" id="contactform">
        <div id="contact" class="contact-area section-padding">
          <div class="container">										
            <div class="section-title text-center">
              <h1>Get in Touch</h1>
            </div>
            <div class="row">
              <div class="col-lg-7">	
                <div class="contact">
                  <form class="form" name="enq" method="POST" enctype="multipart/form-data" id="contactform">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <input type="text" name="name" class="form-control" id="name" placeholder=" Your Name *" onkeyup="document.getElementById('nameErr').innerHTML=''" required="required">
                        <label class="text-danger" id="nameErr"></label>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email *" onkeyup="document.getElementById('emailErr').innerHTML=''" required="required">
                        <label class="text-danger" id="emailErr"></label>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Mobile Number *" onkeyup="document.getElementById('phoneErr').innerHTML=''" required="required">
                        <label class="text-danger" id="phoneErr"></label>
                      </div>
                      <div class="form-group col-md-12">
                        <input type="text" name="subject" class="form-control" id="subject" placeholder="Your subject *" onkeyup="document.getElementById('subjectErr').innerHTML=''" required="required">
                        <label class="text-danger" id="subjectErr"></label>
                      </div>
                      <div class="form-group col-md-12">
                        <textarea rows="6" name="message" class="form-control" id="message" placeholder="Your Message *" onkeyup="document.getElementById('messageErr').innerHTML=''" required="required"></textarea>
                        <label class="text-danger" id="messageErr"></label>
                      </div>
                      <div class="col-md-12 text-center">
                        <button type="submit" value="Send message" name="submit" id="btnSubmit" class="btn btn-contact-bg" title="Submit Your Message!">Send Message</button>
                      </div>
                    </div>
                    <div id="mail-status"></div>
                  </form>

                </div>
              </div><!--- END COL --> 
  
            </div><!--- END ROW -->
          </div><!--- END CONTAINER -->	
        </div>


        
<script>

 $(document).ready(function () {

		$("#btnSubmit").click(function (event) {

			event.preventDefault();

			  var data = new FormData($('#contactform')[0]);

			  if($('#name').val().trim()==''){

				 document.getElementById("nameErr").innerHTML = "Please provide Name";

				 document.getElementById("name").focus();

				 return;

			  }

			  if($('#email').val().trim()==''){

				 document.getElementById("emailErr").innerHTML = "Please provide Email";

				 document.getElementById("email").focus();

				 return;

			  }

			  if($('#phone').val().trim()==''){

				 document.getElementById("phoneErr").innerHTML = "Please provide Mobile Number";

				 document.getElementById("phone").focus();

				 return;

			  }
			   if($('#subject').val().trim()==''){

				 document.getElementById("subjectErr").innerHTML = "Please provide subject";

				 document.getElementById("subject").focus();

				 return;

			  }

			  if($('#message').val().trim()==''){

				 document.getElementById("messageErr").innerHTML = "Please provide Message";

				 document.getElementById("message").focus();

				 return;

			  }

			  $("#btnSubmit").prop("disabled", true);

			  

   

    //alert(dataString);

     //var form = $(this);

			  $.ajax({

            type: "POST",

            url: "send_email.php",

            data: data,

            processData: false,

				contentType: false,

				cache: false,

				success: function(data) { 
         console.log(data);
               $("#mail-status").removeClass('text-danger');

						$("#mail-status").addClass('text-success');

						$("#mail-status").html("We have received your enquiry successfully!");

						$("#btnSubmit").prop("disabled", false);

						$('#name').val('');

						$('#email').val('');

						$('#phone').val('');
						$('#subject').val('');

						$('#message').val('');

            },

            error: function(error){

                $("#mail-status").removeClass('text-success');

						$("#mail-status").addClass('text-danger');

						$("#mail-status").html("Something went wrong..Please try again!");

            }

				

            

        

        });

	});

      });

    </script>

        <?php include_once('footer.php'); ?>   
</body>