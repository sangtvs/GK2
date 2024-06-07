<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="text" name="TenUser" placeholder="Tên người dùng" required>
    <input type="password" name="MatKhau" placeholder="Mật khẩu" required>
    <button type="submit">Đăng nhập</button>
</form>
