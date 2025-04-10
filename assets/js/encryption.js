const cbc_key = "%!F*&^$)_*%3f&B+";
const ini_vector = "#*$DJvyw2w%!_-$@";

// AES-CBC Encryption
async function aes_cbc_encryption_(string) {
    const key = await importKey(cbc_key);
    const iv = new TextEncoder().encode(ini_vector);
    const encodedString = new TextEncoder().encode(string);

    const encrypted = await crypto.subtle.encrypt(
        { name: "AES-CBC", iv: iv },
        key,
        encodedString
    );
    // Return the encrypted data as base64 with a static component similar to PHP function
    return btoa(String.fromCharCode(...new Uint8Array(encrypted))) + ":" + btoa("1234567890123456");
}

// AES-CBC Decryption
async function aes_cbc_decryption_(encryptedData) {
    const key = await importKey(cbc_key);
    const iv = new TextEncoder().encode(ini_vector);

    // Decode the base64-encoded string
    const [encryptedText] = encryptedData.split(":");
    const encryptedBytes = Uint8Array.from(atob(encryptedText), c => c.charCodeAt(0));

    const decrypted = await crypto.subtle.decrypt(
        { name: "AES-CBC", iv: iv },
        key,
        encryptedBytes
    );

    return new TextDecoder().decode(decrypted);
}


async function importKey(key) {
    const enc = new TextEncoder();
    return await crypto.subtle.importKey(
        "raw",
        enc.encode(key),
        { name: "AES-CBC", length: 256 },
        false,
        ["encrypt", "decrypt"]
    );
}

