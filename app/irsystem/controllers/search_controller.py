from . import *
from app.irsystem.models.helpers import *
from app.irsystem.models.helpers import NumpyEncoder as NumpyEncoder

project_name = "sellPhones"
net_id = "Alvin Qu: aq38, Andrew Xu: ax28, Kevin Wang: kw534, Samuel Han: sh779"

@irsystem.route('/', methods=['GET'])
def search():
	check = False
	mate = False
	past = request.args.get('past')
	past2 = request.args.get('past2')
	if past:
		check = True
		mate=True
	else:
		mate = True

	if past2 == "True":
		flag = True
	else:
		flag = False


	condition = request.args.get('condition')
	return render_template('search.php', name=project_name,netid=net_id, check=check,  mate=mate, flag=flag, condition=condition)
