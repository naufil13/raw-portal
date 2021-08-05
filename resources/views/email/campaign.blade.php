<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h2>Campaign Update</h2>

    @if($data['reason']!="")
    <p><strong>Reason: </strong> {{ $data['reason'] }}</p>
    @endif
    <p>Check your Campaign <a href="{{ env('FRONT_URL') }}all-bookings">click here</a></p>
  </body>
</html>


