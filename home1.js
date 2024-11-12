// Sample data for service providers
const serviceProviders = [
  {
    name: "John Doe",
    service: "Plumber",
    location: "Guntur Pin Code-522002",
  },
  {
    name: "Jane Smith",
    service: "Electrician",
    location: "Narasaraopet Pin Code-522601",
  },
  {
    name: "Mike Brown",
    service: "Caretaker",
    location: "Vijayawada Pin Code-502355",
  },
  {
    name: "Sara White",
    service: "Nurse",
    location: "Piduguralla Pin Code-522413",
  },
  {
    name: "Lily Johnson",
    service: "AC repair",
    location: "Gudivada Pin Code-521301",
  },
  {
    name: "Chris Green",
    service: "Carpenter",
    location: "Addanki Pin Code-523201",
  },
  {
    name: "Linda Lee",
    service: "Cook",
    location: "Vuyyuru Pin Code-521165",
  },
  {
    name: "Nancy Moore",
    service: "Painter",
    location: "Sattenpalli Pin Code-522403",
  },
  {
    name: "Paul Walker",
    service: "Construction worker",
    location: "Macherla Pin Code-4522020",
  },
  {
    name: "Hannah Lewis",
    service: "Daily wage worker",
    location: "Parchur Pin Code-523169",
  },
  {
    name: "Sam Adams",
    service: "Driver",
    location: "Bapatla Pin Code-522101",
  },
  {
    name: "Emma Watson",
    service: "Packers-and-movers",
    location: "Chirala Pin Code-522102",
  },
  {
    name: "Robert Brown",
    service: "Room Renters",
    location: "Machavaram Pin Code-522615",
  },
  {
    name: "Alice Black",
    service: "Internet Connection",
    location: "Achampeta Pin Code-509375",
  },
  {
    name: "Tom Cruise",
    service: "Home builders",
    location: "Machilipatnam Pin Code-521001",
  },
  {
    name: "Julia Roberts",
    service: "Financial services",
    location: "Bhimavaram Pin Code-534201",
  },
  {
    name: "Michael Clark",
    service: "Mobile services",
    location: "Dharmavaram Bazar Pin Code-515671",
  },
  {
    name: "Laura Davis",
    service: "Plumber",
    location: "Tadepalli Pin Code-522504",
  },
  {
    name: "Steve Baker",
    service: "Electrician",
    location: "Eluru Pin Code-534001",
  },
  {
    name: "Rachel Stone",
    service: "Teacher",
    location: "Nuzivid Pin Code-521201",
  },
];


function searchServices() {
  const serviceInput = document
    .getElementById("service-input")
    .value.toLowerCase();
  const locationInput = document
    .getElementById("location-input")
    .value.toLowerCase();
  const resultsContainer = document.getElementById("results");

  // Filter service providers based on input
  const filteredProviders = serviceProviders.filter(
    (provider) =>
      provider.service.toLowerCase().includes(serviceInput) &&
      provider.location.toLowerCase().includes(locationInput)
  );

  // Display results
  resultsContainer.innerHTML ="<h2>Search Results:</h2>";
   const searchQuery= document.getElementById('service-input').value;
   if(searchQuery){
    window.location.href='details.html?q=${encodeURIComponent(searchQuery)}';
   }
   else {
    resultsContainer.innerHTML +=" <p>No results found for the given search criteria.</p>";
  }
}

