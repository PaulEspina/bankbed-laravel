<form method="POST" action="/login">
    @csrf
    <div class="div">
        <h3>Login</h3> 
    </div>
    <div class="div">
        <label for="username">Username</label>
        <input id="username" name="username">
    </div>
    <div class="div">
        <label for="password">Password</label>
        <input id="password" name="password" type="password">
    </div>
    <div class="div">
        <input id="submit" type="submit">
    </div>
</form>
