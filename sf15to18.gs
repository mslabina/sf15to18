function sf15to18(id) {
	if (!id) throw new TypeError('No id given.');
	if (typeof id !== 'string') throw new TypeError('The given id isn\'t a string');
	if (id.length === 18) return id;
	if (id.length !== 15) throw new RangeError('The given id isn\'t 15 characters long.');

	// Generate three last digits of the id
	for (var i = 0; i < 3; i++) {
		var f = 0;

		// For every 5-digit block of the given id
		for (var j = 0; j < 5; j++) {
			// Assign the j-th character of the i-th 5-digit block to c
			var c = id.charAt(i * 5 + j);

			// Check if c is an uppercase letter
			if (c >= 'A' && c <= 'Z') {
				// Set a 1 at the character's position in the reversed segment
				f += 1 << j;
			}
		}

		// Add the calculated character for the current block to the id
		id += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ012345'.charAt(f);
	}

	return id;
}
