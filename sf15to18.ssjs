<script runat='server'>

    Platform.Load('core', '1');

    try {

        var id15 = '00Q3X00001IJJr2';

        var id18 = sf15to18(id15);

        Write(Stringify(id18));

    } catch(error) {

        Write(Stringify(error));

    }

    function sf15to18(id) {

        if (!id) throw 'No id given.';
        if (typeof id !== 'string') throw 'The given id isn\'t a string';
        if (id.length === 18) return id;
        if (id.length !== 15) throw 'The given id isn\'t 15 characters long.';

        for (var i = 0; i < 3; i++) {

            var f = 0;

            for (var j = 0; j < 5; j++) {

                var c = id.charAt(i * 5 + j);

                if (c >= 'A' && c <= 'Z') {
                    f += 1 << j;
                }

            }

            id += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ012345'.charAt(f);
        }

        return id;

    }

</script>
