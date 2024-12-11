async function submitForm() {
    const formData = new FormData(document.getElementById('diagnosisForm'));

    try {
        const response = await fetch('process.php', {
            method: 'POST',
            body: formData
        });
        const result = await response.text();
        document.getElementById('result').innerHTML = result;
    } catch (error) {
        document.getElementById('result').innerHTML = 'Error: Could not submit the form.';
    }
}
