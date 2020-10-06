<footer class="page-footer">
    <div class="center-align">
        2020 Trabalho - Programação Web II
    </div>
</footer>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        @if (session('sucesso'))
            M.toast({html: "{{session('sucesso')}}"});
        @endif
    </script>
</body>

</html>
