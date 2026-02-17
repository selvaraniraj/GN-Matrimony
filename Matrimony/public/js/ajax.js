const inrenalApiService = async(request)=> {
    try {
        const response = await fetch(request.url,{
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'API-KEY': 'hLUApYsvzbO2wMdrn1G+4g==',
            },
            body: JSON.stringify(request.data)
        });
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }
        const json = await response.json();
        console.log({json})
        return json;
    }
    catch (error) {
        console.error(error)
        throw error;
    }
}
