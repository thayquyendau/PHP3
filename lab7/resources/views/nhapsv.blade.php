<form method="post" action="{{ route('sv_store') }}">
    @csrf
    <label>Mã sinh viên:</label><input type="text" name="masv" required>
    <label>Họ tên:</label><input type="text" name="hoten" required>
    <label>Tuổi:</label><input type="number" name="tuoi" required>
    <label>Ngày sinh:</label><input type="date" name="ngaysinh" required>
    <label>CMND:</label><input type="text" name="cmnd" required>
    <label>Email:</label><input type="email" name="email" required>
    <button type="submit">Lưu thông tin</button>
</form>
