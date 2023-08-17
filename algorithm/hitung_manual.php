<?php 

class Hitung_Manual
{
    var $sBox = array(
		array(0x63, 0x7c, 0x77, 0x7b, 0xf2, 0x6b, 0x6f, 0xc5, 0x30, 0x01, 0x67, 0x2b, 0xfe, 0xd7, 0xab, 0x76),
		array(0xca, 0x82, 0xc9, 0x7d, 0xfa, 0x59, 0x47, 0xf0, 0xad, 0xd4, 0xa2, 0xaf, 0x9c, 0xa4, 0x72, 0xc0),
		array(0xb7, 0xfd, 0x93, 0x26, 0x36, 0x3f, 0xf7, 0xcc, 0x34, 0xa5, 0xe5, 0xf1, 0x71, 0xd8, 0x31, 0x15),
		array(0x04, 0xc7, 0x23, 0xc3, 0x18, 0x96, 0x05, 0x9a, 0x07, 0x12, 0x80, 0xe2, 0xeb, 0x27, 0xb2, 0x75),
		array(0x09, 0x83, 0x2c, 0x1a, 0x1b, 0x6e, 0x5a, 0xa0, 0x52, 0x3b, 0xd6, 0xb3, 0x29, 0xe3, 0x2f, 0x84),
		array(0x53, 0xd1, 0x00, 0xed, 0x20, 0xfc, 0xb1, 0x5b, 0x6a, 0xcb, 0xbe, 0x39, 0x4a, 0x4c, 0x58, 0xcf),
		array(0xd0, 0xef, 0xaa, 0xfb, 0x43, 0x4d, 0x33, 0x85, 0x45, 0xf9, 0x02, 0x7f, 0x50, 0x3c, 0x9f, 0xa8),
		array(0x51, 0xa3, 0x40, 0x8f, 0x92, 0x9d, 0x38, 0xf5, 0xbc, 0xb6, 0xda, 0x21, 0x10, 0xff, 0xf3, 0xd2),
		array(0xcd, 0x0c, 0x13, 0xec, 0x5f, 0x97, 0x44, 0x17, 0xc4, 0xa7, 0x7e, 0x3d, 0x64, 0x5d, 0x19, 0x73),
		array(0x60, 0x81, 0x4F, 0xDC, 0x22, 0x2A, 0x90, 0x88, 0x46, 0xEE, 0xB8, 0x14, 0xDE, 0x5E, 0x0B, 0xDB),
		array(0xe0, 0x32, 0x3a, 0x0a, 0x49, 0x06, 0x24, 0x5c, 0xc2, 0xd3, 0xac, 0x62, 0x91, 0x95, 0xe4, 0x79),
		array(0xe7, 0xc8, 0x37, 0x6d, 0x8d, 0xd5, 0x4e, 0xa9, 0x6c, 0x56, 0xf4, 0xea, 0x65, 0x7a, 0xae, 0x08),
		array(0xba, 0x78, 0x25, 0x2e, 0x1c, 0xa6, 0xb4, 0xc6, 0xe8, 0xdd, 0x74, 0x1f, 0x4b, 0xbd, 0x8b, 0x8a),
		array(0x70, 0x3e, 0xb5, 0x66, 0x48, 0x03, 0xf6, 0x0e, 0x61, 0x35, 0x57, 0xb9, 0x86, 0xc1, 0x1d, 0x9e),
		array(0xe1, 0xf8, 0x98, 0x11, 0x69, 0xd9, 0x8e, 0x94, 0x9b, 0x1e, 0x87, 0xe9, 0xce, 0x55, 0x28, 0xdf),
		array(0x8c, 0xa1, 0x89, 0x0d, 0xbf, 0xe6, 0x42, 0x68, 0x41, 0x99, 0x2d, 0x0f, 0xb0, 0x54, 0xbb, 0x16)
	);

    var $ltable = array(
        0x00, 0xff, 0xc8, 0x08, 0x91, 0x10, 0xd0, 0x36,
        0x5a, 0x3e, 0xd8, 0x43, 0x99, 0x77, 0xfe, 0x18,
        0x23, 0x20, 0x07, 0x70, 0xa1, 0x6c, 0x0c, 0x7f,
        0x62, 0x8b, 0x40, 0x46, 0xc7, 0x4b, 0xe0, 0x0e,
        0xeb, 0x16, 0xe8, 0xad, 0xcf, 0xcd, 0x39, 0x53,
        0x6a, 0x27, 0x35, 0x93, 0xd4, 0x4e, 0x48, 0xc3,
        0x2b, 0x79, 0x54, 0x28, 0x09, 0x78, 0x0f, 0x21,
        0x90, 0x87, 0x14, 0x2a, 0xa9, 0x9c, 0xd6, 0x74,
        0xb4, 0x7c, 0xde, 0xed, 0xb1, 0x86, 0x76, 0xa4,
        0x98, 0xe2, 0x96, 0x8f, 0x02, 0x32, 0x1c, 0xc1,
        0x33, 0xee, 0xef, 0x81, 0xfd, 0x30, 0x5c, 0x13,
        0x9d, 0x29, 0x17, 0xc4, 0x11, 0x44, 0x8c, 0x80,
        0xf3, 0x73, 0x42, 0x1e, 0x1d, 0xb5, 0xf0, 0x12,
        0xd1, 0x5b, 0x41, 0xa2, 0xd7, 0x2c, 0xe9, 0xd5,
        0x59, 0xcb, 0x50, 0xa8, 0xdc, 0xfc, 0xf2, 0x56,
        0x72, 0xa6, 0x65, 0x2f, 0x9f, 0x9b, 0x3d, 0xba,
        0x7d, 0xc2, 0x45, 0x82, 0xa7, 0x57, 0xb6, 0xa3,
        0x7a, 0x75, 0x4f, 0xae, 0x3f, 0x37, 0x6d, 0x47,
        0x61, 0xbe, 0xab, 0xd3, 0x5f, 0xb0, 0x58, 0xaf,
        0xca, 0x5e, 0xfa, 0x85, 0xe4, 0x4d, 0x8a, 0x05,
        0xfb, 0x60, 0xb7, 0x7b, 0xb8, 0x26, 0x4a, 0x67,
        0xc6, 0x1a, 0xf8, 0x69, 0x25, 0xb3, 0xdb, 0xbd,
        0x66, 0xdd, 0xf1, 0xd2, 0xdf, 0x03, 0x8d, 0x34,
        0xd9, 0x92, 0x0d, 0x63, 0x55, 0xaa, 0x49, 0xec,
        0xbc, 0x95, 0x3c, 0x84, 0x0b, 0xf5, 0xe6, 0xe7,
        0xe5, 0xac, 0x7e, 0x6e, 0xb9, 0xf9, 0xda, 0x8e,
        0x9a, 0xc9, 0x24, 0xe1, 0x0a, 0x15, 0x6b, 0x3a,
        0xa0, 0x51, 0xf4, 0xea, 0xb2, 0x97, 0x9e, 0x5d,
        0x22, 0x88, 0x94, 0xce, 0x19, 0x01, 0x71, 0x4c,
        0xa5, 0xe3, 0xc5, 0x31, 0xbb, 0xcc, 0x1f, 0x2d,
        0x3b, 0x52, 0x6f, 0xf6, 0x2e, 0x89, 0xf7, 0xc0,
        0x68, 0x1b, 0x64, 0x04, 0x06, 0xbf, 0x83, 0x38
    );

    function addRoundKey_str($state, $key)
    {

        $state = hex2bin($state);
        $key = hex2bin($key);

        $result = $state ^ $key;

        $result = bin2hex($result);

        return $result;
    }

    function addRoundKey_str_2($state, $key)
    {

        if (strlen($state) % 2 !== 0) {
            $state = "0" . $state;
        }

        $state = hex2bin($state);
        $key = hex2bin($key);

        $result = $state ^ $key;

        $result = bin2hex($result);

        return $result;
    }

    function addRoundKey($state, $key)
    {

        $state = hex2bin($state);
        $key = hex2bin($key);

        $result = $state ^ $key;

        $result = bin2hex($result);

        $matrix = [];
        $hexChars = str_split($result, 2);

        for ($row = 0; $row < 4; $row++) {
            $matrix[] = array_slice($hexChars, $row * 4, 4);
        }

        return $matrix;
    }

    function SubByte($data)
	{
        
		$state = $data;

		for ($i = 0; $i < 4; $i++) {
			for ($j = 0; $j < 4; $j++) {
                if (is_null($this->subword(hexdec($state[$i][$j])))) {
                    $state[$i][$j] = $this->subword(45);
                }else{
                    $state[$i][$j] = $this->subword(hexdec($state[$i][$j]));
                }
				
			}
		}

		return $state;
	}

    function subword($byte)
	{
		# menghitung panjang inputan yang sudah dikonversikan menjadi HEX
		# jika panjang inputan 2
		if (strlen(dechex($byte)) == 2) {
			# konversi inputan kedalam bentuk HEX
			# memecah inputan menjadi array
			$hex 	= str_split(dechex($byte));

			# karakter ke-1 menjadi index baris
			$r		= hexdec($hex[0]);
			# karakter ke-2 menjadi index kolom
			$c		= hexdec($hex[1]);
		} else {
			# jika panjang inputan 1
			$r = 0;
			# inputan menjadi index kolom
			$c = $byte;
		}

		# mengembalikan nilai table sBox berdasarkan index baris & kolom
		# r : baris | c : kolom
		return $this->sBox[$r][$c];
	}

    function shiftRows($state)
    {

    $shiftedState = $state;

    
    $temp_1 = $shiftedState[3][3];
    $temp_2 = $shiftedState[0][1];
    $temp_3 = $shiftedState[0][2];
    $temp_4 = $shiftedState[0][3];  
    $temp_5 = $shiftedState[1][2];
    $temp_6 = $shiftedState[1][3];
    $temp_7 = $shiftedState[2][3];


    // $shiftedState[0][0] = $shiftedState[1][1];
    $shiftedState[0][1] = $shiftedState[1][1];
    $shiftedState[0][2] = $shiftedState[2][2];
    $shiftedState[0][3] = $temp_1;  

    // Shift second row
    $temp = $shiftedState[1][0];
    // $shiftedState[1][0] = $shiftedState[1][0];
    $shiftedState[1][1] = $shiftedState[2][1];
    $shiftedState[1][2] = $shiftedState[3][2];
    $shiftedState[1][3] = $temp_4;

    // Shift third row
    // $temp = $shiftedState[2][0];
    // $shiftedState[2][0] = $shiftedState[2][2];
    $shiftedState[2][2] = $temp_3;
    $temp = $shiftedState[2][1];
    $shiftedState[2][1] = $shiftedState[3][1];
    $shiftedState[2][3] = $temp_6;

    // Shift fourth row
    // $temp = $shiftedState[3][3];
    $shiftedState[3][1] = $temp_2;
    $shiftedState[3][2] = $temp_5;
    $shiftedState[3][3] = $temp_7;
    // $shiftedState[3][0] = $temp;

    return $shiftedState;
    }
    // function shiftRows($state)
    // {
    //     $blockSize = 16; // AES block size is 128 bits (16 bytes)
    //     $numRows = $blockSize / 4; // Number of rows in the block

    //     // Split the block into rows
    //     $rows = str_split($state, $numRows);

    //     // Shift each row
    //     for ($i = 1; $i < $numRows; $i++) {
    //         $rows[$i] = $this->shiftRowLeft($rows[$i], $i);
    //     }

    //     // Combine the shifted rows back into a block
    //     $result = implode('', $rows);

    //     return $result;
    // }

    function shiftRowLeft($row, $numShifts)
    {
        // Perform left cyclic shift on the row
        $numShifts = $numShifts % strlen($row); // Handle overflow
        $shiftedRow = substr($row, $numShifts) . substr($row, 0, $numShifts);

        return $shiftedRow;
    }
    

    function mixColumns($state)
    {
    $mixedState = [];

    for ($col = 0; $col < 4; $col++) {
        $column = array_column($state, $col);
        $mixedColumn = $this->mixSingleColumn($column);
        $mixedState[] = $mixedColumn;
    }

    return $this->transposeMatrix($mixedState);
    }

    function mixSingleColumn($column)
{
    $mixedColumn = [];

    $mul2 = function ($value) {
        $value = hexdec($value);
        if ($value >= 0x80) {
            $result = ($value << 1) ^ 0x1b;
        } else {
            $result = $value << 1;
        }
        return $result & 0xff;
    };

    $mul3 = function ($value) use ($mul2) {
        return $mul2($value) ^ hexdec($value);
    };

    $mixedColumn[0] = str_pad(dechex($mul2($column[0])  ^ $mul3($column[1])  ^ hexdec($column[2]) ^ hexdec($column[3])), 2, '0', STR_PAD_LEFT);
    $mixedColumn[1] = str_pad(dechex(hexdec($column[0]) ^ $mul2($column[1])  ^ $mul3($column[2])  ^ hexdec($column[3])), 2, '0', STR_PAD_LEFT);
    $mixedColumn[2] = str_pad(dechex(hexdec($column[0]) ^ hexdec($column[1]) ^ $mul2($column[2])  ^ $mul3($column[3])), 2, '0', STR_PAD_LEFT);
    $mixedColumn[3] = str_pad(dechex($mul3($column[0])  ^ hexdec($column[1]) ^ hexdec($column[2]) ^ $mul2($column[3])), 2, '0', STR_PAD_LEFT);

    return $mixedColumn;
}

function array_to_string2($arr)
{
    $result = '';
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
            $result .= str_pad($arr[$i][$j], 2, '0', STR_PAD_LEFT);
        }
    }

    return $result;
}


    function transposeMatrix($matrix)
    {
        return array_map(null, ...$matrix);
    }

    // Helper function to convert a block string to a 4x4 matrix
    function blockToMatrix($block)
    {
        $matrix = [];
        $hexChars = str_split($block, 2);

        for ($row = 0; $row < 4; $row++) {
            $matrix[] = array_slice($hexChars, $row * 4, 4);
        }

        return $matrix;
    }

    // Helper function to convert a 4x4 matrix to a block string
    function matrixToBlock($matrix)
    {
        $block = '';
    
        foreach ($matrix as $row) {
            $block .= implode('', $row);
        }
    
        return $block;
    }

    function array_to_string($arr)
    {
        $result = '';
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $result .= str_pad(dechex($arr[$i][$j]), 2, '0', STR_PAD_LEFT);
            }
        }

        return $result;
}   


// function array_to_string2($arr)
// {
//     $result = '';
//     for ($i = 0; $i < 4; $i++) {
//         for ($j = 0; $j < 4; $j++) {
//             $result .= strval($arr[$i][$j]);
//         }
//     }

//     return $result;
// }


}

?>