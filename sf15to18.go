package sf15to18

import (
	"unicode"
	"bytes"
	"errors"
)

func Convert(id string) (string, error) {
	if len(id) == 18 {
		return id, nil
	}

	if len(id) != 15 {
		return "", errors.New("The given id isn't 15 characters long.")
	}

	const alphabet string = "ABCDEFGHIJKLMNOPQRSTUVWXYZ012345"
	var longId bytes.Buffer

	// Write input id to output buffer as a starting point
	longId.WriteString(id)

	// Generate three last digits of the id
	for i := 0; i < 3; i++ {
		var f int = 0;

		// For every 5-digit block of the given id
		for j := 0; j < 5; j++ {
			// Assign the j-th chracter of the i-th 5-digit block to c
			var c rune = rune(id[i * 5 + j]);

			// Check if c is an uppercase letter
			if unicode.IsUpper(c) {
				// Set a 1 at the character's position in the reversed segment
				f += 1 << uint(j);
			}
		}

		// Add the calculated character for the current block to the id
		longId.WriteString(string(alphabet[f]));
	}

	return longId.String(), nil
}
