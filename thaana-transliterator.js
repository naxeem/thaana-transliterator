const thaanaTransliterator = input => {
    // fili + punctuations
    let listOne = {
        "އަ": "a", "އާ": "aa", "އި": "i", "އީ": "ee", "އު": "u", "އޫ": "oo", "އެ": "e", "އޭ": "ey", "އޮ": "o", "ޢަ": "a", "ޢާ": "aa", "ޢި": "i", "ޢީ": "ee", "ޢު": "u", "ޢޫ": "oo", "ޢެ": "e", "ޢޭ": "ey", "ޢޮ": "o", "އޯ": "oa", "ުއް": "uh", "ިއް": "ih", "ެއް": "eh", "ަށް": "ah", "ައް": "ah", "ށް": "h", "ތް": "i", "ާއް": "aah", "އް": "ih", "އް": "h", "]": "[", "[": "]", "\\": "\\", "\'": "\'", "،": ",", ".": ".", "/": "/", "÷": "", "}": "{", "{": "}", "|": "|", ":": ":", "\"": "\"", ">": "<", "<": ">", "؟": "?", ")": ")", "(": "("
    };
    // fili + akuru
    let listTwo = {
        "ަ": "a", "ާ": "aa", "ި": "i", "ީ": "ee", "ު": "u", "ޫ": "oo", "ެ": "e", "ޭ": "ey", "ޮ": "o", "ޯ": "oa", "ް": "", "ހ": "h", "ށ": "sh", "ނ": "n", "ރ": "r", "ބ": "b", "ޅ": "lh", "ކ": "k", "އ": "a", "ވ": "v", "މ": "m", "ފ": "f", "ދ": "dh", "ތ": "th", "ލ": "l", "ގ": "g", "ޏ": "y", "ސ": "s", "ޑ": "d", "ޒ": "z", "ޓ": "t", "ޔ": "y", "ޕ": "p", "ޖ": "j", "ޗ": "ch", "ޙ": "h", "ޚ": "kh", "ޛ‎": "z", "ޜ‎": "z", "ޝ‎": "sh", "ޝ": "sh", "ޤ": "q", "ޢ": "a", "ޞ": "s", "ޟ": "dh", "ޡ": "z", "ޠ": "t", "ާާޣ": "gh", "ޘ": "th", "ޛ": "dh", "ާާޜ": "z"
    };
    // english words to properly replace
    // should add more words here
    let listThree = {
		"މުހައްމަދ": "Mohamed",
		"އަހްމަދ": "Ahmed",
		"އެއާޕޯޓ": "airport",
		"އިންސްޓިޓިއުޓ": "institute",
	};
    // escape for regexp
    const escapeRegExp = string => {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')
    }
    // replace thaana with english
    const replaceLetters = (input, replacables) => {
        for (let k in replacables) {
            if (!replacables.hasOwnProperty(k)) continue;
            v = replacables[k];
            input = input.replace(new RegExp(escapeRegExp(k), 'g'), v);
        }
        return input;
    }
    // replace zero width non joiners
    input = input.replace(/[\u200B-\u200D\uFEFF]/g, '');
    // replace letter
    input = replaceLetters(input, listThree);
    input = replaceLetters(input, listOne);
    input = replaceLetters(input, listTwo);
    // capitalize first letter of sentence
    input = input.replace(/(^\s*\w|[\.\!\?]\s*\w)/g, function(c) {
        return c.toUpperCase();
    });
    return input;
};
