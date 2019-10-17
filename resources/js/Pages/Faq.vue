<template>
	<layout>
		<div class="bg-orange-100 pt-8 md:pt-10 px-4">
			<div class="max-w-5xl mx-auto">
				<div class="flex items-center overflow-hidden">
					<div class="w-2/3">
						<heading size="small-caps" class="mb-1 text-orange-500">Help &amp; Support</heading>
						<heading size="display" class="mb-4">Frequently asked Questions</heading>
					</div>
					<div class="w-1/3 border-b-2 border-orange-200">
						<div
							class="mx-auto w-32 h-32 md:w-64 md:h-64 bg-orange-200 relative rounded-full overflow-hidden -mb-6 md:-mb-10"
						>
							<img
								src="/it_support.svg"
								alt="working"
								class="object-cover w-64 mx-auto absolute left-0 right-0"
								style="top: 20px"
							/>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="py-4 md:py-16">
			<div class="max-w-3xl mx-auto">
				<card :is-padding="false">
					<accordion class="px-8">
						<heading size="large" slot="title">How much does it cost to use GYE?</heading>
						<p
							class="pb-5"
						>Lorem ipsum dolor sit amet, ut alii voluptaria est, ad illum inimicus deterruisset eam. His eu bonorum adipisci definiebas, no vis nostrud conclusionemque. Ad his virtute accusata, pro habemus singulis temporibus ut, ne bonorum dolores euripidis quo. No nam amet erant intellegebat. Rationibus instructior id pri, vis case abhorreant ea, id sea meis feugiat.</p>

						<p
							class="pb-5"
						>Ut vel percipit facilisi, sea partem veritus mandamus eu, at debet deleniti eos. Iudico suscipit mel ut. Per ad habeo sadipscing concludaturque. Pri lorem fastidii in, accusam honestatis signiferumque est ut, ea eos omnium senserit reprehendunt. Eu est nibh invenire.</p>
					</accordion>
					<accordion class="px-8">
						<heading size="large" slot="title">Can I use GYE for free events?</heading>
						<p
							class="pb-5"
						>Lorem ipsum dolor sit amet, ut alii voluptaria est, ad illum inimicus deterruisset eam. His eu bonorum adipisci definiebas, no vis nostrud conclusionemque. Ad his virtute accusata, pro habemus singulis temporibus ut, ne bonorum dolores euripidis quo. No nam amet erant intellegebat. Rationibus instructior id pri, vis case abhorreant ea, id sea meis feugiat.</p>

						<p
							class="pb-5"
						>Ut vel percipit facilisi, sea partem veritus mandamus eu, at debet deleniti eos. Iudico suscipit mel ut. Per ad habeo sadipscing concludaturque. Pri lorem fastidii in, accusam honestatis signiferumque est ut, ea eos omnium senserit reprehendunt. Eu est nibh invenire.</p>
					</accordion>
					<accordion class="px-8">
						<heading size="large" slot="title">How do I sell tickets on GYE?</heading>
						<p
							class="pb-5"
						>Lorem ipsum dolor sit amet, ut alii voluptaria est, ad illum inimicus deterruisset eam. His eu bonorum adipisci definiebas, no vis nostrud conclusionemque. Ad his virtute accusata, pro habemus singulis temporibus ut, ne bonorum dolores euripidis quo. No nam amet erant intellegebat. Rationibus instructior id pri, vis case abhorreant ea, id sea meis feugiat.</p>

						<p
							class="pb-5"
						>Ut vel percipit facilisi, sea partem veritus mandamus eu, at debet deleniti eos. Iudico suscipit mel ut. Per ad habeo sadipscing concludaturque. Pri lorem fastidii in, accusam honestatis signiferumque est ut, ea eos omnium senserit reprehendunt. Eu est nibh invenire.</p>
					</accordion>
					<accordion class="px-8">
						<heading size="large" slot="title">How do I get money from GYE?</heading>
						<p
							class="pb-5"
						>Lorem ipsum dolor sit amet, ut alii voluptaria est, ad illum inimicus deterruisset eam. His eu bonorum adipisci definiebas, no vis nostrud conclusionemque. Ad his virtute accusata, pro habemus singulis temporibus ut, ne bonorum dolores euripidis quo. No nam amet erant intellegebat. Rationibus instructior id pri, vis case abhorreant ea, id sea meis feugiat.</p>

						<p
							class="pb-5"
						>Ut vel percipit facilisi, sea partem veritus mandamus eu, at debet deleniti eos. Iudico suscipit mel ut. Per ad habeo sadipscing concludaturque. Pri lorem fastidii in, accusam honestatis signiferumque est ut, ea eos omnium senserit reprehendunt. Eu est nibh invenire.</p>
					</accordion>
					<accordion class="px-8">
						<heading size="large" slot="title">How do I get refund on GYE?</heading>
						<p
							class="pb-5"
						>Lorem ipsum dolor sit amet, ut alii voluptaria est, ad illum inimicus deterruisset eam. His eu bonorum adipisci definiebas, no vis nostrud conclusionemque. Ad his virtute accusata, pro habemus singulis temporibus ut, ne bonorum dolores euripidis quo. No nam amet erant intellegebat. Rationibus instructior id pri, vis case abhorreant ea, id sea meis feugiat.</p>

						<p
							class="pb-5"
						>Ut vel percipit facilisi, sea partem veritus mandamus eu, at debet deleniti eos. Iudico suscipit mel ut. Per ad habeo sadipscing concludaturque. Pri lorem fastidii in, accusam honestatis signiferumque est ut, ea eos omnium senserit reprehendunt. Eu est nibh invenire.</p>
					</accordion>
					<accordion class="last px-8">
						<heading size="large" slot="title">Can I cancel my free tickets on GYE?</heading>
						<p
							class="pb-5"
						>Lorem ipsum dolor sit amet, ut alii voluptaria est, ad illum inimicus deterruisset eam. His eu bonorum adipisci definiebas, no vis nostrud conclusionemque. Ad his virtute accusata, pro habemus singulis temporibus ut, ne bonorum dolores euripidis quo. No nam amet erant intellegebat. Rationibus instructior id pri, vis case abhorreant ea, id sea meis feugiat.</p>

						<p
							class="pb-5"
						>Ut vel percipit facilisi, sea partem veritus mandamus eu, at debet deleniti eos. Iudico suscipit mel ut. Per ad habeo sadipscing concludaturque. Pri lorem fastidii in, accusam honestatis signiferumque est ut, ea eos omnium senserit reprehendunt. Eu est nibh invenire.</p>
					</accordion>
				</card>
			</div>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import Heading from "@/Shared/tuis/Heading";
import Card from "@/Shared/tuis/Card";
import LinkTo from "@/Shared/tuis/LinkTo";
import Accordion from "@/Shared/tuis/Accordion";

export default {
	components: {
		Layout,
		Heading,
		Card,
		LinkTo,
		Accordion
	}
};
</script>