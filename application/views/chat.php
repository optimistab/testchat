<?php
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Chat Application</title>
    <script src="<?php echo base_url(); ?>views/mainfxns.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
    <script>
    <?php  const Chat = require('twilio-chat');
    const accessToken = $accesstoken;
    Chat.Client.create(accessToken).then(client => {

    }); ?>
    </script>
  </head>

  <body>

    <div class="col-lg-5 col-lg-offset-2">
          <h1>Welcome:</h1>
          <?php if(isset($_SESSION['success'])){?>
            <div class ="alert alert success"> <?php echo $_SESSION['success'];?></div>
            <?php
          } ?>
          HELLO, <?php echo $_SESSION['username']; ?> <br>
    </div>

  <div class="container">
    <div class="row">

      <div class="col-md-3">
          <div class="card">
            <div class="card-header">Users</div>
            <div class="card-body">
        <?php   @if ($users->isEmpty()) ?>
              <p>No users</p>
          <?php    @else ?>
              <ul class="list-group list-group-flush">
            <?php    @foreach ($users as $user) ?>
              <a href="{{ route('messages.chat', [ 'ids' => auth()->user()->id  . '-' . $user->id ]) }}" class="list-group-item list-group-item-action">{{ $user->name }}</a>
      <?php      @endforeach ?>
          </ul>
    <?php     @endif ?>
          </div>
        </div>
      </div>


      <div class="col-md-9">
        <div class="card">
          <div class="card-body text-center">
            <p class="font-weight-bold">You don’t have a chat selected</p>
            <p>Choose a user to continue an existing chat or start a new one.</p>
          </div>
        </div>
      </div>


  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <chat-component :auth-user="{{ auth()->user() }}" :other-user="{{ $otherUser }}"></chat-component>
      </div>
    </div>
  </div>


    </div>
  </div>
    <script src="https://media.twiliocdn.com/sdk/js/chat/v3.3/twilio-chat.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

  </body>
</html>
