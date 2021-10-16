export const formatPrice = price => {
    return new Intl.NumberFormat('en-EN', { 
        style: 'currency', 
        currency: 'EUR',
        maximumFractionDigits: 0
    }).format(price);
}

export const buildQuery = (baseUrl, params) => {
    return baseUrl + '?' + new URLSearchParams(params).toString();
}
