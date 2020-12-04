<?php
	include('./config/db.php');
    include('./action/core.php');

    // Create Instance of core class
    $obj = new dataOperaion;

    include('./partials/session-manager.php');

    if(isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['rating']) && isset($_POST['comments'])) {

        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $rating = $_POST['rating'];
        $comments = $_POST['comments'];

        $values = array(
            "name" => $full_name,
            "email" => $email,
            "rating" => $rating,
            "comments" => $comments,
        );

        // $feedql = "INSERT INTO feedback(name, email, rating, comments) VALUES('$full_name', '$email', $rating, '$comments')";
        // $result = mysqli_query($this -> con, $feedql);
        if ($obj->insert("feedback", $values)) {
            header("location: feedback.php");
        } else {
            echo '';
        }
    } else {
        echo '';
    }

?>

<!DOCTYPE html>
<html>
	<head>
        <title>Intern-Connect | Feedback Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>

	<body>
		<?php include('./partials/nav.php'); ?>
        <div class="container">
			<div class="row">
            <div class="col-md-12">
                <h3 class="pt-3 text-center text-muted">Fill the Feedback Form</h3>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="feedback.php">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" required minlength="3" maxlength="150">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email ID" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="rating">Rating</label>
                                        <select name="rating" id="rating" class="form-control" required>
                                            <option value="5">5</option>
                                            <option value="4">4</option>
                                            <option value="3">3</option>
                                            <option value="2">2</option>
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="comments">Comments</label>
                                        <textarea name="comments" id="comments" class="form-control" rows="7" placeholder="Write a bit about your experience on the website" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="add_feedback" class="btn btn-primary my-3 float-right">Save Details</button>
                        </form>
                    </div>
                </div>
                <div class="container" align="center">
                    <p>Don't worry we won't spam you!!</p>
                </div>
            </div>
        </div>
		</div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Select2 Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <!-- Jquery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.select2-selection--single').css({
                "padding-top": "3px",
                "height": "38px"
            })
        });
    </script>
</body>
</html>