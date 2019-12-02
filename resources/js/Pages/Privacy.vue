<template>
	<layout>
		<div class="bg-orange-100 pt-8 md:pt-10 px-4">
			<div class="max-w-5xl mx-auto">
				<div class="flex items-center overflow-hidden">
					<div class="w-2/3">
						<!-- <heading size="small-caps" class="mb-1 text-orange-500">Grab Your Event</heading>
						-->
						<heading size="display" class="mb-4" tag="h1">Privacy Policy</heading>
					</div>
					<div class="w-1/3 border-b-2 border-orange-200 relative">
						<div
							class="mx-auto w-32 h-32 md:w-64 md:h-64 bg-orange-200 relative rounded-full overflow-hidden -mb-6 md:-mb-10"
						>
							<img
								src="/Frame.svg"
								alt="working"
								class="object-cover w-64 mx-auto -mr-4 absolute left-0 right-0 bottom-0"
							/>
						</div>
						<!-- <img src="/focus_working.svg" alt="working" class="object-cover w-64 mx-auto -mb-6 md:-mb-10" /> -->
					</div>
				</div>
			</div>
		</div>

		<div class="py-10 px-4">
			<div class="max-w-5xl mx-auto">
				<div class="flex -mx-4 mb-10">
					<div class="w-full px-4">
						<heading size="large" class="mb-2">Our Philosophy</heading>
						<div>Grab Your Event values your privacy and respects your personal sphere of life. We are committed to maintaining your confidence and trust with respect to the information we collect about you. We maintain strict confidentiality and the data collected is only used to serve you better and to improve your overall experience.</div>

						<heading size="large" class="mt-10 mb-2">For the Organiser</heading>
						<div
							class="mb-3"
						>We collect information related to your event through ‘do it yourself’ mode. The information you provide to host your event includes your organization details, details of the representative, details of the event and pricing for your event. Through the process, information related to saleability, etc of your event is collected.</div>
						<div
							class="mb-3"
						>In order to access features and services of Grab Your Event, You must register and obtain a personalised username and password. Your personal information can only be retrieved by supplying the correct username and password linked to your profile.</div>
						<div
							class="mb-3"
						>We understand that your privacy is important, and therefore, we endeavour to keep your personal information secured. The personal information of each organiser is stored on servers that are behind a firewall and are housed within secured data centres provided by established global players.</div>
						<div>Our internal policies and systems protect your privacy by limiting unauthorized employee access to use of your personal information.</div>

						<heading size="large" class="mt-10 mb-2">For the Users</heading>
						<div
							class="mb-3"
						>We collect your personal information, location, contact details, interests, etc. As part of our policy. However, we do not store your card details. We only showcase the events.</div>
						<div
							class="mb-3"
						>In order to access features and services of Grab Your Event, You must register and obtain a personalised username and password. Your personal information can only be retrieved by supplying the correct username and password linked to your profile.</div>
						<div
							class="mb-3"
						>We understand that your privacy is important, and therefore, we endeavour to keep your personal information secured. The personal information of each organiser is stored on servers that are behind a firewall and are housed within secured data centres provided by established global players.</div>
						<div>Our internal policies and systems protect your privacy by limiting unauthorized employee access to use of your personal information.</div>

						<heading size="large" class="mt-10 mb-2">Cookies</heading>
						<div>Grab Your Event also collects information through the use of cookies. Cookies are anonymous, and unique alphanumeric identifiers sent from our website and stored in your web browser while you are browsing. With the use of these cookies, we collect your Internet Protocol (IP) address used to connect your computer to internet. We collect information such as your browser type and version, operating system and the content you viewed or searched on the Grab Your Event website.</div>

						<heading size="large" class="mt-10 mb-2">Personalization</heading>
						<div>We use the above information along with a stream of algorithms for tailoring and customizing content or design of Grab Your Event website. We also use the information such as interests, characteristics, etc., for our research and development in order to enhance product features, recommendations, saleability, etc.</div>

						<heading size="large" class="mt-10 mb-2">Exclusions</heading>
						<div
							class="mb-3"
						>In the event of you voluntarily disclosing personally identifiable information along with any substantive content on your social media page or Grab Your Event social media page, such activities are beyond the control of Grab Your Event. Grab Your Event does not monitor or secure such information that can be collected, correlated and used by third parties from sources that are not secured. This may also result in unsolicited messages from third parties.</div>
						<div>Grab Your Event may contain links to other websites that are beyond our control. In the event of you choosing to access such websites, Grab Your Event is not responsible for any actions or policies of such third parties. We recommend to you to check the privacy policy of such websites before submitting any information with them.</div>

						<heading size="large" class="mt-10 mb-2">Children</heading>
						<div>
							We do not specifically intend to service children under the age of 13 years and hence do not collect any information in this regard, unless it is an event for all age groups and is permitted by law. Grab Your Event usually targets an audience that is over the age of 18. If you are a parent or guardian of a child under 13 and believe that he or she has disclosed personal information to us, please
							<link-to tag="inertia-link" to="/contact-us">Contact Us</link-to>.
						</div>

						<heading size="large" class="mt-10 mb-2">Modification</heading>
						<div>We review our policies from time to time and make necessary changes whenever required. Any changes to our privacy policy will be posted on this page so that you are always aware of our policies.</div>

						<heading size="large" class="mt-10 mb-2">Contact</heading>
						<div>
							We always invite your comments and questions about Grab Your Event website, it's services and user interface. Please
							<link-to tag="inertia-link" to="/contact-us">Contact Us</link-to>for any queries.
						</div>
					</div>
				</div>
			</div>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import Heading from "@/Shared/tuis/Heading";
import Card from "@/Shared/tuis/Card";
import LinkTo from "@/Shared/tuis/LinkTo";

export default {
	components: {
		Layout,
		Heading,
		Card,
		LinkTo
	}
};
</script>