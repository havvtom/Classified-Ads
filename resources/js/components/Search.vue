<template>
  <ais-instant-search
    index-name="instant_search"
    :search-client="searchClient"
  >
    <!-- Widgets -->
  </ais-instant-search>
</template>

<script>
import InstantSearch from 'vue-instantsearch';
  export default {
    data() {
      return {
        searchClient: algoliasearch(
          'latency',
          '6be0576ff61c053d5f9a3225e2a90f76'
        ),
      };
    },
  };
</script>

<!-- <template>
	<form class="form mt-3">
		<div class="form-group">
			<input 
				type="text" 
				class="form-control" 
				placeholder="Search listing by title, body, location, etc"
				id="listing-search"
				autocomplete="off" 
			>
		</div>
	</form>
</template>
<script type="text/javascript">
	import { listingsautocomplete } from '../helpers/autocomplete'
	export default {
		mounted () {
			listingsautocomplete('#listing-search')
		}
	}
</script> -->