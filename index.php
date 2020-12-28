<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Lavender Foodie | Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom_styles.css">
</head>

<body>

  <div class="container mt-5">

    <h2 class="text-center mb-4">Form Validation</h2>

    <!-- Form validation script -->
    <?php include('script.php'); ?>

    <!-- Contact form -->
    <form action="" method="post" novalidate>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Name</label>
        <div class="col-sm-8">
          <input type="text" name="name" class="form-control">

          <!-- Error -->
          <?php echo $nameEmptyErr; ?>
          <?php echo $nameErr; ?>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-8">
          <input type="email" name="email" class="form-control">

          <!-- Error -->
          <?php echo $emailEmptyErr; ?>
          <?php echo $emailErr; ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Education</label>
        <div class="col-sm-8">
          <select id="education" name="education" class="form-control">
            <option selected="" disabled>...</option>
            <option value="Graduation">Graduation</option>
            <option value="Post Graduation">Post Graduation</option>
          </select>

          <!-- Error -->
          <?php echo $educationEmptyErr; ?>
        </div>
      </div>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-4 pt-0">Gender</legend>
          <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="male" name="gender" value="Male" class="custom-control-input">
              <label class="custom-control-label" for="male">Male</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="female" name="gender" value="Female" class="custom-control-input">
              <label class="custom-control-label" for="female">Female</label>
            </div>

            <!-- Error -->
            <?php echo $genderEmptyErr; ?>
          </div>
        </div>
      </fieldset>
      <div class="form-group row">
        <div class="col-sm-4">Hobbies</div>
        <div class="col-sm-8">
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" name="hoby[]" value="Drawing" class="custom-control-input" id="drawing">
            <label class="custom-control-label" for="drawing">Drawing</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" name="hoby[]" value="Singing" class="custom-control-input" id="singing">
            <label class="custom-control-label" for="singing">Singing</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" name="hoby[]" value="Dancing" class="custom-control-input" id="dancing">
            <label class="custom-control-label" for="dancing">Dancing</label>
          </div>

          <!-- Error -->
          <?php echo $hobyEmptyErr; ?>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Comment</label>
        <div class="col-sm-8">
          <textarea class="form-control" name="comment" id="comment" rows="4"></textarea>

          <!-- Error -->
          <?php echo $commentEmptyErr; ?>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-12 mt-3">
          <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>