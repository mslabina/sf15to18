Function sf15to18(id As String) As String
	If Len(id) = 15 Then
		' Generate three last digits of the id
		For i = 0 To 2
			Dim f
			f = 0
	
			' For every 5-digit block of the given id
			For j = 0 To 4
				' Assign the j-th character of the i-th 5-digit block to c
				Dim c
				c = Asc(Mid(id, (i * 5 + j + 1), 1))
	
				' Check if c is an uppercase letter
				If c >= 65 And c <= 90 Then
					' Set a 1 at the character's position in the reversed segment
					f = f + (1 * (2 ^ j))
				End If
			Next j
			' Add the calculated character for the current block to the id
			id = id + Mid("ABCDEFGHIJKLMNOPQRSTUVWXYZ012345", (f + 1), 1)
		Next i
		sf15to18 = id
	Else
		If Len(id) = 18 Then
			sf15to18 = id
		Else
			sf15to18 = ""
		End If
	End If
End Function
