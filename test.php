<?php require_once 'includes/header.php'; ?>


<div id="page">
    <div id="navbar"><span>Red Stapler - SheetJS </span></div>
    <div id="wrapper">
            <table id="mytable">
                    <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    </tr>
                    <tr>
                    <td>Harry</td>
                    <td>Potter</td>
                    <td>WB</td>
                    </tr>
                    <tr>
                    <td>Captain</td>
                    <td>America</td>
                    <td>Marvel</td>
                    </tr>
                    </table>
            <button id="button-a">Create Excel</button>
    </div>
    <script>
            var wb = XLSX.utils.table_to_book(document.getElementById('mytable'), {sheet:"Sheet JS"});
            var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
            function s2ab(s) {
                            var buf = new ArrayBuffer(s.length);
                            var view = new Uint8Array(buf);
                            for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                            return buf;
            }
            $("#button-a").click(function(){
            saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'test.xlsx');
            });
    </script>
    </div>
<?php require_once 'includes/footer.php'; ?>