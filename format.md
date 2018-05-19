# Create Company Module

Create Company API's

## **1. Add Subscription**

Add Subscription.

**URL** : `/api/addsubscription`

**Method** : `POST`

**Header** : `[{"key":"Content-Type","value":"application/json","description":""}]`

**Auth required** : YES

**Data constraints**

```json
{        
    "name":"Abcd",        
    "address_line_1":"nashik",
    "address_line_2":"nashik",
    "office_location_name":"nashik",
    "company_type_id":"1",        
    "city_id":"1",        
    "country_id":"1",        
    "state_id":"1",        
    "pincode":"1",        
    "locality":"1"        
}
```

### Success Responses

**Content** 

```json
{
    "status": true,
    "message": "Subscription created successfully!",
    "data": [
        {
            "subscription_id": 4,
            "name": "Abcd",
            "company_owners_data": []
        }
    ]
}
```

### Error Responses

**Content** 

```json
{
  "status": false,
  "message": "xxxxx",
  "data":null
}
```

## **2. Get Countries**

**URL** : `/api/countries`

**Method** : `GET`

**Header** : `[{"key":"Content-Type","value":"application/json","description":""}]`

**Auth required** : YES

### Success Response

Subscription Transaction Listing.

```json
{
    "status": true,
    "message": "Countries list created successfully!",
    "data": [
        {
            "id": 1,
            "name": "India",
            "code": "IN",
            "currency_id": 1
        },
        {
            "id": 2,
            "name": "Sri Lanka",
            "code": "LK",
            "currency_id": 2
        },
        {
            "id": 3,
            "name": "United Kingdom",
            "code": "GB",
            "currency_id": 1
        }
    ]
}
```

### Error Responses

**Content** 

```json
{
  "status": false,
  "message": "No data found",
  "data":null
}
```

## **3. Get States**

**URL** : `/api/states/{country_id}`

**Method** : `GET`

**Header** : `[{"key":"Content-Type","value":"application/json","description":""}]`

**Auth required** : YES

### Success Response

```json
{
    "status": true,
    "message": "states list created successfully!",
    "data": [
        {
            "id": 3,
            "name": "Andra Pradesh",
            "code": "IN-AP",
            "country_id": 1
        },
        {
            "id": 1,
            "name": "Maharashtra",
            "code": "IN-MH",
            "country_id": 1
        },
        {
            "id": 4,
            "name": "Rajasthan",
            "code": "IN-RJ",
            "country_id": 1
        },
        {
            "id": 2,
            "name": "Uttar Pradesh",
            "code": "IN-UP",
            "country_id": 1
        }
    ]
}
```

### Error Responses

**Content** 

```json
{
  "status": false,
  "message": "No data found",
  "data":null
}
```

## **4. Get Cities**

**URL** : `/api/cities/{state_id}`

**Method** : `GET`

**Header** : `[{"key":"Content-Type","value":"application/json","description":""}]`

**Auth required** : YES

### Success Response

```json
{
    "status": true,
    "message": "Cities list created successfully!",
    "data": [
        {
            "id": 1,
            "name": "Mumbai",
            "code": "MU",
            "country_id": 1,
            "state_id": 1
        },
        {
            "id": 2,
            "name": "Pune",
            "code": "PN",
            "country_id": 1,
            "state_id": 1
        }
    ]
}
```

### Error Responses

**Content** 

```json
{
  "status": false,
  "message": "No data found",
  "data":null
}
```

## **5. Get Company Types**

**URL** : `/api/companytypes/{country_id}}`

**Method** : `GET`

**Header** : `[{"key":"Content-Type","value":"application/json","description":""}]`

**Auth required** : YES

### Success Response

```json
{
    "status": true,
    "message": "Company Types list created successfully!",
    "data": [
        {
            "id": 2,
            "name": "Private Ltd"
        },
        {
            "id": 3,
            "name": "Proprietorship"
        },
        {
            "id": 1,
            "name": "Public Ltd"
        }
    ]
}
```

### Error Responses

**Content** 

```json
{
  "status": false,
  "message": "No data found",
  "data":null
}
```

## **6. Get Package**

**URL** : `/api/packages/{subscription_id}(company)`

**Method** : `GET`

**Header** : `[{"key":"Content-Type","value":"application/json","description":""}]`

**Auth required** : YES

### Success Response

```json
{
    "status": true,
    "message": "Pakages list created successfully!",
    "data": {
        "pakages": {
            "1": {
                "Track": {
                    "modules": {
                        "1": "Attendance",
                        "2": "Leave",
                        "3": "Biometric"
                    },
                    "price": 49,
                    "selected": false
                }
            }
        },
        "subscriptions_months": 12
    }
}
```

### Error Responses

**Content** 

```json
{
    "status": false,
    "message": "No Pakages found",
    "data": null
}
```

## **7. Add Packge**

**URL** : `/api/addpackages`

**Method** : `POST`

**Header** : `[{"key":"Content-Type","value":"application/json","description":""}]`

**Auth required** : YES

**Content**

```json

{
    "subscription_employee_count":"100",
    "subscription_id":"1",
    "packages":[
        {"package_id":"1",
            "price":"49"
        },
        {
            "package_id":"5",
            "price":"49"
        }
    ]
}
```

### Success response

```json

{
    "status": true,
    "message": "Subscription Packages created successfully!",
    "data": {
        "subscription_id": "1"
    }
}
```

### Error Responses

**Content** 

```json
{
    "status": false,
    "message": "Subscription Packages not created",
    "data": null
}
```

## **8. Get packages amount**

**URL** : `/api/showpackages`

**Method** : `POST`

**Header** : `[{"key":"Content-Type","value":"application/json","description":""}]`

**Auth required** : YES

**Content**

```json

{
    "subscription_employee_count" : "20",
    "subscription_id" : "1",
    "month" : "6",
    "packages" : [1]
}
```

### Success response

```json

{
  "status": true,
  "message": "Subscription Packages created successfully!",
  "data": {
    "package_details": [
      {
        "package": "BASE HR (Employee Data, MIS Reports, Misc.)",
        "package_id": null,
        "emp_count": "FREE",
        "price": "FREE",
        "sub-total": "FREE",
        "selected": true
      },
      {
        "package": "TRACK(Attendance, Leave, Biometric)",
        "package_id": 1,
        "emp_count": "20",
        "price": 49,
        "sub-total": 5880,
        "selected": true
      },
      {
        "package": "PAY(Payroll, Reimbursement, Timesheet)",
        "package_id": 2,
        "emp_count": "-",
        "price": 49,
        "sub-total": "-",
        "selected": false
      },
      {
        "package": "ENGAGE(Streams, Checklist, Helpdesk)",
        "package_id": 3,
        "emp_count": "-",
        "price": 49,
        "sub-total": "-",
        "selected": false
      },
      {
        "package": "PERFORMANCE(Performance Review, Survey, Recognition)",
        "package_id": 4,
        "emp_count": "-",
        "price": 49,
        "sub-total": "-",
        "selected": false
      },
      {
        "package": "STORE(HR Letter, HR Drive, Asset)",
        "package_id": 5,
        "emp_count": "-",
        "price": 49,
        "sub-total": "-",
        "selected": false
      },
      {
        "package": "RECRUIT(ATS, Career site, Social Rercruiting)",
        "package_id": 6,
        "emp_count": "-",
        "price": 49,
        "sub-total": "-",
        "selected": false
      }
    ],
    "details": {
      "title": "Sutra Subscription for 6 Months (January 2018 to July 2018)",
      "Product_Sub": 5880,
      "gst": 764.4,
      "total_subscription": 6644.4
    }
  }
}
```

<!-- ### Error Responses

**Content** 

```json
{
    "status": false,
    "message": "Subscription Packages not created",
    "data": null
} -->

## **9. Subscription Listing**

**URL** : `/api/getsubscriptions/`

**Method** : `POST`

**Header** : `[{"key":"Content-Type","value":"application/json","description":""}]`

**Auth required** : YES

**Content**

```json
{
    "status": true,
    "message": "Subscription list get successfully.",
    "data": [
        {
            "company_id": 19,
            "name": "sumHR2",
            "company_owners_data": [
                {
                    "id": 32,
                    "name": "vishal k",
                    "username": "vishalk1@gmail.com",
                    "first_name": "vishal",
                    "last_name": "k"
                },
                {
                    "id": 33,
                    "name": "Kiran d",
                    "username": "kirand@gmail.com",
                    "first_name": "Kiran",
                    "last_name": "d"
                }
            ]
        }
    ]
}
```

### Success response

```json

{
  "status": true,
  "message": "Subscription Packages created successfully!",
  "data": {
    "package_details": [
      {
        "package": "BASE HR (Employee Data, MIS Reports, Misc.)",
        "package_id": null,
        "emp_count": "FREE",
        "price": "FREE",
        "sub-total": "FREE",
        "selected": true
      },
      {
        "package": "TRACK(Attendance, Leave, Biometric)",
        "package_id": 1,
        "emp_count": "20",
        "price": 49,
        "sub-total": 5880,
        "selected": true
      },
      {
        "package": "PAY(Payroll, Reimbursement, Timesheet)",
        "package_id": 2,
        "emp_count": "-",
        "price": 49,
        "sub-total": "-",
        "selected": false
      },
      {
        "package": "ENGAGE(Streams, Checklist, Helpdesk)",
        "package_id": 3,
        "emp_count": "-",
        "price": 49,
        "sub-total": "-",
        "selected": false
      },
      {
        "package": "PERFORMANCE(Performance Review, Survey, Recognition)",
        "package_id": 4,
        "emp_count": "-",
        "price": 49,
        "sub-total": "-",
        "selected": false
      },
      {
        "package": "STORE(HR Letter, HR Drive, Asset)",
        "package_id": 5,
        "emp_count": "-",
        "price": 49,
        "sub-total": "-",
        "selected": false
      },
      {
        "package": "RECRUIT(ATS, Career site, Social Rercruiting)",
        "package_id": 6,
        "emp_count": "-",
        "price": 49,
        "sub-total": "-",
        "selected": false
      }
    ],
    "details": {
      "title": "Sutra Subscription for 6 Months (January 2018 to July 2018)",
      "Product_Sub": 5880,
      "gst": 764.4,
      "total_subscription": 6644.4
    }
  }
}
```

<!-- ### Error Responses

**Content** 

```json
{
    "status": false,
    "message": "Subscription Packages not created",
    "data": null
} -->