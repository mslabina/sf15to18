def sf15to18 (id_):
	if not id_:
		raise ValueError('No id given.')
	if not isinstance(id_, str):
		raise TypeError('The given id isn\'t a string')
	if len(id_) == 18:
		return id_
	if len(id_) != 15:
		raise ValueError('The given id isn\'t 15 characters long.')

	# Generate three last digits of the id
	for i in range(3):
		f = 0

		# For every 5-digit block of the given id
		for j in range(5):
			# Assign the j-th chracter of the i-th 5-digit block to c
			c = id_[i * 5 + j]

			# Check if c is an uppercase letter
			if c.isupper():
				# Set a 1 at the character's position in the reversed segment
				f += 1 << j

		# Add the calculated character for the current block to the id
		id_ += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ012345'[f]

	return id_
