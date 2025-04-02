

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    document.getElementById('btnSearch').addEventListener('click', function() {
        var keyword = document.getElementById('keyword').value;
        var rootUrl = "<?= ROOT_URL ?>"; // Lấy biến PHP chính xác

        if (keyword.trim() !== "") {
            location.href = rootUrl + "?ctl=search&keyword=" + encodeURIComponent(keyword);
        }
        
    });


</script>
</body>
</html>