<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Please verify email</title>
</head>

<body>

    <h1>Welcome to Cybersoft</h1>
    <p>
        <?php
            $user  = \App\User::latest()->first();
            $token = \DB::table('personal_access_tokens')->select("*")->where('tokenable_id', $user->id)->first();
        ?>
        To active your account, please click on this <a href="{{ Request::root() }}/verify-email/{{ $token->token }}" target="_blank">Verify</a>
    </p>
</body>

</html>
<script>
    import VerifyRegistrationComponent from "../../js/components/email/VerifyRegistrationComponent";
    export default {
        components: {VerifyRegistrationComponent}
    }
</script>
